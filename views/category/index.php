<?php

/** @var yii\web\View $this */

use yii\bootstrap4\Html;

$this->title = 'Product Category';
?>
<div class="bg-transparent mt-4">
    <h3 class=" text-secondary">Product Category</h3>
</div>

<div class="body-content">

    <?php if ( yii::$app->session->hasFlash('message')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo yii::$app->session->getFlash('message');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif;?>

    <div class="row ml-0 mb-3">
        <span><?= Html::a('Create', ['/category/create'], ['class' => 'btn btn-success']) ?></span>
    </div>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Created At</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($data) > 0) : ?>
            <?php foreach ($data as $key => $value) : ?>
            <tr>
                <th scope="row"><?php echo $key+1; ?></th>
                <td><?php echo $value->name; ?></td>
                <td><?php echo date('d-m-Y', strtotime($value->created_at)); ?></td>
                <td>
                    <span><?= Html::a('View', ['view', 'id' => $value->id], ['class' => 'badge badge-success p-2 m-1']) ?></span>
                    <span><?= Html::a('Update', ['update', 'id' => $value->id], ['class' => 'badge badge-warning p-2 m-1']) ?></span>
                    <span><?= Html::a('Delete', ['delete', 'id' => $value->id], ['class' => 'badge badge-danger p-2 m-1']) ?></span>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else : ?>
            <tr>
                <td>No Record Found !</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>