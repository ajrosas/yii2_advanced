<?php 

namespace backend\widgets;

use yii\base\Widget;

class ViewFormContainer extends Widget 
{
    public $model;

    public function init() 
    {
        parent::init();

    }

    public function run()
    {

        return $this->render('view-form-container', [
            'model' => $this->model,
        ]);
        
    }
}


?>