<?php
//подключение к базе
function connectToDb(){
    $config = require 'core/configs/dbConnect.php';
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    mysqli_set_charset($conn, "utf8");
    if (!$conn) {
        die("Connection failed:" . mysqli_connect_error());
    }
    return $conn;
}

//функции связаны операциями над данными в бд
function selectData($sql){
   $myconnect = connectToDb();
   $res = mysqli_query($myconnect, $sql);
    if(!$res){
        die(mysqli_error($myconnect));
    }
    return $res;
}
function insertUpdateDelete($sql){
    $myconnect = connectToDb();
   $res = mysqli_query($myconnect, $sql);
    if(!$res){
        die(mysqli_error($myconnect));
    }
    return $res;
    
}
//Экранирует специальные символы в строке для использования в SQL выражении, используя текущий набор символов соединения
function getSaveData($str){
    $myconnect = connectToDb();
    return mysqli_real_escape_string($myconnect, $str);
}