<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use common\models\Role;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\RoleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;

$this->params['toolbar_actions'] = [
    Html::a('Create Role', ['create'], ['class' => 'btn btn-success']),
];

?>
<div class="role-index">

    <div class="card card-custom gutter-b">
        <div class="card-body">

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <div class="table-responsive">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'name',
                        // 'backend_module_access:ntext',
                        // 'backend_navigations:ntext',
                        'role_access:ntext',
                        // 'frontend_navigations:ntext',
                        // 'frontend_module_access:ntext',
                        'level',
                        'record_status',
                        'created_at',
                        'updated_at',
                        [
                            'class' => ActionColumn::className(),
                            'urlCreator' => function ($action, Role $model, $key, $index, $column) {
                                return Url::toRoute([$action, 'id' => $model->id]);
                             }
                        ],
                    ],
                ]); ?>
            </div>

        </div>
    </div>


</div>
