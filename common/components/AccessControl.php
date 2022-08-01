<?php

namespace common\components; 
 
use Yii;
use yii\base\Component; 
use yii\helpers\FileHelper;
use yii\helpers\Inflector;
use common\models\Role;

class AccessControl extends Component
{

    public function controller_actions($side='@backend')
    {
        // get controllers' path
        $controller_paths = FileHelper::findFiles(Yii::getAlias("{$side}/controllers"),[
            'recursive' => true
        ]);

        if (!$controller_paths) {
            return false;
        }

        // convert controllers' path to controllers' names
        foreach($controller_paths as $controller_path){ 

            $content = file_get_contents($controller_path); //gets the controllers' contents 
            $controller_name = Inflector::camel2Id(substr(basename($controller_path), 0, -14));

            preg_match_all('/public function action(\w+?)\(/', $content, $result);

                sort($result[1]);
            
                foreach($result[1] as $action){
                    $action_name = Inflector::camel2Id($action); 

                    if($action_name != 's'){
                        $controller_actions[$controller_name][] = $action_name; 
                    } 
                } 
        }   

        asort($controller_actions); //sort by key

        return $controller_actions;
    }

    public function getActions($controller = null, $side='@backend')
    { 
        $controller = ($controller) ?: Yii::$app->controller->id;
        // get all actions per Controller
        return $this->controller_actions($side)[$controller];
    }

    public function getModuleAccess($controller = null)
    {   
        $controller = $controller ?: Yii::$app->controller->id;

        if(!Yii::$app->user->isGuest){ 
            // all user accessed actions
            // $userAccess = json_decode(Yii::$app->user->identity->role->module_access, true); 
            $userAccess = Yii::$app->user->identity->role->module_access; 

            // filter user access based on controller visited
            // $access = isset($userAccess[$controller]) ? json_decode(Yii::$app->user->identity->role->module_access, true)[$controller] : null;  
            $access = isset($userAccess[$controller]) ? Yii::$app->user->identity->role->module_access[$controller] : null;  

        } else{ 
            return false;
        }
         
        return ($access != []) ? $access : []; 
    }

    public function getRoleAccess($role_id = null)
    {
        if (!$role_id) {
            return null;
        }

        $model = Role::find()
            ->orFilterWhere(['id' => $role_id])
            ->one();

        return $model->role_access;
    }

    public function getAllControllerWithActions($controller = null, $side='@backend')
    {
        $data = [];
        if (!empty($this->controller_actions($side))) {

            foreach ($this->controller_actions($side) as $controller => $actions) {

                if(!empty($actions)){
                    foreach ($actions as $key => $action) {
                        $data[] = $controller.'/'.$action;
                    }
                }

            }

        }

        return $data;
    }
 
} 

?>