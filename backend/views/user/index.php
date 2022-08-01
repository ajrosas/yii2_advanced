<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="card-toolbar">
                <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <div class="card-body">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'role_id',
                    'username',
                    'email:email',
                    'password_hash',
                    //'auth_key',
                    //'password_reset_token',
                    //'verification_token',
                    'record_status',
                    'created_at',
                    'updated_at',
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, User $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                         }
                    ],
                ],
            ]); ?>

        </div>
    </div>


</div>
