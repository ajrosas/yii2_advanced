<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\RoleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'backend_module_access') ?>

    <?= $form->field($model, 'frontend_module_access') ?>

    <?= $form->field($model, 'role_access') ?>

    <?= $form->field($model, 'backend_navigations') ?>

    <?= $form->field($model, 'frontend_navigations') ?>

    <?php // echo $form->field($model, 'level') ?>

    <?php // echo $form->field($model, 'record_status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
