<?php

use yii\helpers\Html;

?>

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <?= Html::encode($title) ?> 
            </div>
        </div>
    	<div class="card-body">
		    <?= $view ?>
    	</div>
    </div>