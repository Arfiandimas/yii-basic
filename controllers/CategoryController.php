<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ProductCategory;
use yii\helpers\ArrayHelper;

class CategoryController extends Controller
{
    public function actionIndex()
    {
        $data = ProductCategory::find()
        ->all();
        return $this->render('index', compact('data'));
    }

    public function actionCreate()
    {
        $productCategory = new ProductCategory();

        $formData = Yii::$app->request->post();
        if ($productCategory->load($formData)) {
            if ($productCategory->save()) {
                Yii::$app->getSession()->setFlash('message', 'Product category added....');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('message', 'Failed add product category....');
            }
        }

        return $this->render('create', compact('productCategory'));
    }

    public function actionDelete($id)
    {
        $data = ProductCategory::findOne($id)->delete();
        if ($data) {
            Yii::$app->getSession()->setFlash('message', 'Product category deleted....');
            return $this->redirect(['index']);
        }
    }
}