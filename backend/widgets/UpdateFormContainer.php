<?php 

namespace backend\widgets;

use yii\base\Widget;

class UpdateFormContainer extends Widget 
{
    public $view;
    public $title;

    public function init() 
    {
        parent::init();

    }

    public function run()
    {

        return $this->render('update-form-container', [
            'view' => $this->view,
            'title' => $this->title,
        ]);
        
    }
}


?>