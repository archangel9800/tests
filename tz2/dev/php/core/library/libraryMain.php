<?php
require_once 'validator.php';
require_once 'dbInstruction.php';
require_once 'loadTask.php';
require_once 'review.php';
require_once 'admin.php';
        function show404page(){
            header("HTTP/1.1 404 Not Found");
            renderView('page404', []);
        }
//подключение View
function renderView($viewName, $formErrors){
            include 'core/views/'.$viewName.'.php';
}
//проверка на наличие в сесси пользователя
function is_auth(){
    if(isset($_SESSION['user']['id']) and !empty($_SESSION['user']['id'])){
        return true;
    }
    return false;
}
//проверка админ ли пользователь
function is_admin(){
    if($_SESSION['user']['role'] == 'admin'){
        return true;
    }
    return false;
}
//разбивка на чсти адресной строки
function getUrlSegment($num){
    $url = strtolower($_GET['url']);
    $urlSegments = explode('/', $url);
    return $urlSegments[$num]; 
}