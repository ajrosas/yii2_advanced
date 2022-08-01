<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'backend_module_access')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'frontend_module_access')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'role_access')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'backend_navigations')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'frontend_navigations')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'level')->textInput() ?>

    <?= $form->field($model, 'record_status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
