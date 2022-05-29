<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

$this->title = 'Update Product';
?>
<div class="site-index">
    
    <?php if ( yii::$app->session->hasFlash('message')) : ?>
    <?php echo yii::$app->session->getFlash('message');?>
    <?php endif;?>

    <div class="bg-transparent mt-4">
        <h3 class=" text-secondary">Update Product</h3>
    </div>

    <div class="body-content">
        <?php $form = ActiveForm::begin() ?>

        <div class="form-group">
            <?= $form->field($product, 'product_category_id')->label('Category')->dropDownList($product_category); ?>
        </div>

        <div class="form-group">
            <?= $form->field($product, 'name'); ?>
        </div>

        <div class="form-group">
            <?= $form->field($product, 'qty')->textInput(['type' => 'number']); ?>
        </div>

        <div class="form-group">
            <?= $form->field($product, 'price')->textInput(['type' => 'number']); ?>
        </div>

        <div class="form-group">
            <?= $form->field($product, 'updated_at')->label(false)->textInput(['type' => 'hidden', 'value' => date('Y-m-d H:i:s')]); ?>
        </div>

        <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-success']); ?>
            <a href="<?php echo yii::$app->homeUrl;?>" class="btn btn-primary">Back</a>
        </div>

        <?php $form = ActiveForm::end() ?>
    </div>
</div>