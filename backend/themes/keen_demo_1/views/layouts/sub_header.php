<?php

use yii\widgets\Breadcrumbs;

$user_mobile_toggle_actions = ['profile', 'account'];

?>
	<div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
		<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
			<!--begin::Info-->
			<div class="d-flex align-items-center flex-wrap mr-1">


				<?php if(in_array(Yii::$app->controller->action->id, $user_mobile_toggle_actions)){ ?>

					<!--begin::Mobile Toggle-->
					<button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
						<span></span>
					</button>
					<!--end::Mobile Toggle-->

				<?php } ?>

				<!--begin::Page Heading-->
				<div class="d-flex align-items-baseline flex-wrap mr-5">
					<!--begin::Page Title-->
					<!-- <h5 class="text-dark font-weight-bold my-1 mr-5"><?php //echo $this->title ?></h5> -->
					<!--end::Page Title-->

					<!--begin::Breadcrumb-->
                    <?=  Breadcrumbs::widget(['homeLink' => 
                       [
                        'label' => '<i class="la la-landmark icon-lg"></i> ',
                        'encode' => false,
                        'url' => ['site/index'],
                        'class' => '',
                        //'template' =>' {link} '
                        ],
                        'activeItemTemplate'=>' <li class="breadcrumb-item">{link}</li>',
                        'itemTemplate' => '<li class="breadcrumb-item">{link}</li>',
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        'options' => ['class' => 'breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm'],
                        //'tag' => 'div'
                    ]) ?>
					<!--end::Breadcrumb-->

				</div>
				<!--end::Page Heading-->
			</div>
			<!--end::Info-->
			<!--begin::Toolbar-->
			<div class="d-flex align-items-center flex-wrap">
				<?php if($this->params['toolbar_actions']){ ?>
					
					<?php foreach($this->params['toolbar_actions'] as $key => $content){ ?>
						<?= $content ?>
					<?php } ?>

				<?php } ?>
			</div>
			<!--end::Toolbar-->
		</div>
	</div>
