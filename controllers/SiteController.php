<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Product;
use app\models\Author;
use app\models\ProductCategory;
use yii\helpers\ArrayHelper;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = Product::find()
        ->all();
        return $this->render('home', compact('data'));
    }

    public function actionCreate()
    {
        $product_category = ArrayHelper::map(ProductCategory::find()->asArray()->all(),'id','name');
        $product = new Product();

        $formData = Yii::$app->request->post();
        if ($product->load($formData)) {
            if ($product->save()) {
                Yii::$app->getSession()->setFlash('message', 'Product added....');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed add product....');
            }
        }

        return $this->render('product/create', compact('product_category', 'product'));
    }

    public function actionView($id)
    {
        $data = Product::find()
        ->where(['id' => $id])
        ->one();
        return $this->render('product/view', compact('data'));
    }

    public function actionUpdate($id)
    {
        $product_category = ArrayHelper::map(ProductCategory::find()->asArray()->all(),'id','name');
        $product = Product::find()
        ->where(['id' => $id])
        ->one();

        if ($product->load(Yii::$app->request->post()) && $product->save()) {
            Yii::$app->getSession()->setFlash('message', 'Product updated....');
            return $this->redirect(['index', 'id'=>$product->id]);
        } else {
            return $this->render('product/update', compact('product_category', 'product'));
        }
    }

    public function actionDelete($id)
    {
        $data = Product::findOne($id)->delete();
        if ($data) {
            Yii::$app->getSession()->setFlash('message', 'Product deleted....');
            return $this->redirect(['index']);
        }
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
