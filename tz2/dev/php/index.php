<?php
session_start();
require_once 'core/library/libraryMain.php';
require_once 'core/configs/configsMain.php';

if(!empty(getUrlSegment(0))){
    if(file_exists('core/controllers/'.getUrlSegment(0).'.php')){
        $cntrName = getUrlSegment(0);
        require_once 'core/controllers/'.$cntrName.'.php';
            if(empty(getUrlSegment(1))){
                $actionName = 'action_index';
            } else{
                $actionName = 'action_'.getUrlSegment(1);
            }
            if(function_exists($actionName)){
                $actionName();
            }else{
                show404page();
            }   
    } else{
         header('Location: '.BASE_URL."/main");
    }
} else{
    header('Location: '.BASE_URL."/main");
}



?>





	
