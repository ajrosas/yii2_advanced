<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Role */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$this->params['toolbar_actions'] = [
    Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-sm btn-primary mr-2']),
    Html::a('Delete', ['delete', 'id' => $model->id], [
        'class' => 'btn btn-sm btn-danger',
        'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
        ],
    ]),
];

?>
<div class="role-view">

    <?= \backend\widgets\ViewFormContainer::widget(['model' => $model]) ?>

</div>
