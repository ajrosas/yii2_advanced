<?php

use yii\widgets\DetailView;
use yii\helpers\Html;

?>

    <div class="card card-custom gutter-b">
        <div class="card-body">

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => $model->getDetailColumns()
            ]) ?>

        </div>
    </div> 