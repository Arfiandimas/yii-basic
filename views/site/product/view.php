<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Html;
use yii\widgets\ActiveForm;

$this->title = 'Show Product';
?>
<div class="site-index">

    <div class="bg-transparent mt-4">
        <h3 class=" text-secondary">Show Product</h3>
    </div>

    <div class="body-content">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Author : <?php echo $data->author->name;?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Category : <?php echo $data->productCategory->name;?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Name : <?php echo $data->name;?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Qty : <?php echo $data->qty;?>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Price : <?php echo $data->price;?>
            </li>

            <div class="row ml-0 mt-3">
                <a href="<?php echo yii::$app->homeUrl;?>" class="btn btn-primary">Back</a>
            </div>
        </ul>
    </div>
</div>