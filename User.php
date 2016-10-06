<?php
/**
* 
*/
class User {
    public static function can() {
       $args = func_get_args();
       if(!$args){
           $permissionName =  'hello/index';	//Yii::$app->controller->action->id;
           $params = [];
       }else{
           $argsNumber = count($args);
           if($argsNumber > 2){
               throw new Exception('Too many arguments passed to function ' . __FUNCTION__);
           }else if($argsNumber == 2){
               $permissionName = array_shift($args);
               $params = array_shift($args);               
               if(!is_array($params)){
                   throw new Exception('Second argument passed to function ' . __FUNCTION__ . ' must be array');
               }
           }else{
               if(is_array($params = array_shift($args))){
                   $permissionName =  'hello/index';//Yii::$app->controller->action->id;
               }else{
                   $permissionName = $params;
                   $params = [];
               }
           }
       }

       $ar = array();
       $ar[0] = $permissionName;
       $ar[1] = $params;
       return $ar;
        // if ($result = \Yii::$app->user->can($permissionName, $params)) {
        //    return $result;
        // } else {
        //     throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        // }
    }
}