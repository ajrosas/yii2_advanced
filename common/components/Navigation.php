<?php

namespace common\components; 
 
use Yii;
use yii\base\Component;  
use yii\helpers\Html;
 
class Navigation extends Component
{   
    public function setGuestActions($params = null)
    {
        if (!empty($params)) {
            return [
                'actions' => is_array($params) ? $params : [$params],
                'allow'   => true,
                'roles'   => ['?'],
            ];

        }

        return [];
    }

    public function checkActiveNavigation($url, $position = null)
    {
        if ($position == 'exact') {
                    // exact
            if(Yii::$app->controller->id.'/'.Yii::$app->controller->action->id == $url){
                return true;
            }

        }else{

            // contains
            if(strpos($url, Yii::$app->controller->id) !== false){
                return true;
            }

        }


        return false;
    }
    

    public function generateNavigationMenu($array_list)
    {

        $menu = '';
        if (is_array($array_list)) {
            
            foreach ($array_list as $key => $properties) {

                $menu .= "<li class='dd-item' data-logo='".$properties['icon']."' data-label='".$properties['label']."' data-url='".$properties['url']."'>";

                $menu .= "<div class='dd-handle dd3-handle'>
                            <i class='fas fa-th'></i>
                        </div>";

                $menu .= "<div class='dd3-content'>  
                            <div class='row'>
                                <div class='col-md-3'>
                                    <input type='text' class='form-control' data-action='label' value='".$properties['label']."' required/>
                                </div>
                                <div class='col-md-3'>
                                    <input type='text' class='form-control' data-action='logo' value='".$properties['icon']."' required/>
                                </div>
                                <div class='col-md-4'>
                                    <input type='text' list='urls' class='form-control' data-action='url' value='".$properties['url']."' ".(is_array($properties['actions']) && !empty($properties['actions']) ? '' : 'required')."/>
                                </div>

                                <div class='col-md-2 text-right'>
                                    <span class='remove-nav'><i class='far fa-times-circle text-danger'></i></span>
                                </div>
                            </div>
                         </div>"; 

                    // has child
                   if(is_array($properties['actions']) && !empty($properties['actions'])){ 
                        $menu .= "<ol class='dd-list'>"; 
                            $menu .= $this->generateNavigationMenu($properties['actions']); 
                        $menu .= "</ol>"; 
                   }
     
                $menu .= "</li>"; 
            }   

        }
        return $menu; 
    }
    

    public function generateNavigationsFromNestable($params = ['navigations' => null, 'icon' => null, 'label' => null, 'parent_link' => null])
    {       
        $decoded_navs = is_array($params['navigations']) ? $params['navigations'] : json_decode($params['navigations'], true);
        $navigations = ($decoded_navs) ? $decoded_navs : [];  

        $navs = array();
          
        foreach ($navigations as $key => $attributes) {

            if($attributes['label'] == '' || $attributes['label'] == null){
                continue;
            }

            $new_key = strtolower(str_replace(' ', '-', $attributes['label']));

            $navs[$new_key] = [
                    'icon' => isset($attributes['logo']) ? $attributes['logo'] : '<i class="fas fa-bars"></i>',
                    'label' => isset($attributes['label']) ? $attributes['label'] : 'Not Set',
                    'url' => isset($attributes['url']) ? $attributes['url'] : '#',
                    'actions' => (isset($attributes['children']) && is_array($attributes['children']) && !empty($attributes['children'])) ? $this->generateNavigationsFromNestable(['navigations' => $attributes['children']]) : [],
            ]; 

        }      
         
        return $navs;
    }

    public function GetAllNavigations($except_controllers = [], $valid_actions = [], $create_sub_menu = true, $side = '@backend')
    {
        $navigations = [];
        $except_controllers = (!empty($except_controllers)) ? $except_controllers : ['site'];
        $valid_actions = (!empty($valid_actions)) ? $valid_actions : ['index', 'create'];

        foreach (Yii::$app->AccessControl->controller_actions($side) as $controller => $actions) {

            rsort($actions);

            // skip if controller is exception
            if (in_array($controller, $except_controllers)) {
                continue;
            }

            $navigations[$controller]['icon'] = "<i class=\"fab la-buffer\"></i>";
            $navigations[$controller]['label'] = ucwords(str_replace('-', ' ', $controller));


            if ($create_sub_menu) {

                if (count($actions) == 1 && $actions[0] == 'index') {
                    $navigations[$controller]['url'] = $controller.'/index';
                    $navigations[$controller]['actions'] = [];
                }else{

                    foreach ($actions as $key => $action) {
                        // only valid actions
                        if (!in_array($action, $valid_actions)) {
                            continue;
                        }
                        
                        // add as sub menu
                        if ($action == 'index') {

                            $navigations[$controller]['url'] = $controller.'/'.$action;

                            $navigations[$controller]['actions'][$action] = [
                                'icon' => "<i class=\"ki ki-dots\"></i>",
                                'label' => 'List',
                                // 'label' => ucwords(str_replace('-', ' ', $action)),
                                'url' => $controller.'/'.$action,
                            ];
                        }else if ($action == 'create') {
                
                            $navigations[$controller]['actions'][$action] = [
                                'icon' => "<i class=\"ki ki-dots\"></i>",
                                'label' => ucwords(str_replace('-', ' ', $action.' '.$controller)),
                                'url' => $controller.'/'.$action,
                            ];

                        }else{
                            $navigations[$controller]['actions'][$controller] = [];
                        }
                    }

                }

            }else{

                $navigations[$controller]['url'] = $controller.'/index';
                $navigations[$controller]['actions'] = [];

            }



        }

        return $navigations;
    }


}