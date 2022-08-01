<?php

/* @var $this \yii\web\View */
/* @var $content string */

use common\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;

use backend\themes\keen_demo_1\assets\ThemeAsset;

ThemeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

</head>
<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed subheader-enabled aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<?php $this->beginBody() ?>

    <!--begin::Main-->
        <!--begin::Header Mobile-->
        <?= $this->render('header_mobile') ?>
        <!--end::Header Mobile-->

        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="d-flex flex-row flex-column-fluid page">

            <!--begin::Aside-->
            <?= $this->render('aside') ?>
            <!--end::Aside-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                    <!--begin::Header-->
                    <?= $this->render('header') ?>
                    <!--end::Header-->

                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                        <?= $this->render('sub_header') ?>

                        <div class="d-flex flex-column-fluid">
                            <div class="container">
                                <?= Alert::widget() ?>
                                <?= $content ?>
                            </div>
                        </div>
                            
                    </div>
                    <!--end::Content-->

                    <!--begin::Footer-->
                    <?= $this->render('footer') ?>
                    <!--end::Footer-->

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
    <!--end::Main-->

    <!-- begin::User Panel-->
    <?= $this->render('user_panel') ?>
    <!-- end::User Panel-->

    <!--begin::Quick Panel-->
    <?= $this->render('quick_panel') ?>
    <!--end::Quick Panel-->

    <!--begin::Quick Panel-->
    <?= $this->render('chat_panel') ?>
    <!--end::Quick Panel-->

    <!--begin::Scrolltop-->
    <?= $this->render('scrolltop') ?>
    <!--end::Scrolltop-->

    <script>var HOST_URL = "https://preview.keenthemes.com/keen/theme/tools/preview";</script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3E97FF", "secondary": "#E5EAEE", "success": "#08D1AD", "info": "#844AFF", "warning": "#F5CE01", "danger": "#FF3D60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#DEEDFF", "secondary": "#EBEDF3", "success": "#D6FBF4", "info": "#6125E1", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
    <!--end::Global Config-->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
