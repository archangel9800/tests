<?php
//Функции валидации данных
function required($data){
    if($data){
                return true;
    } else{
        return false;
    }
}
function email($data){
        if($data){
                return true;
    } else{
        return false;
    }
}
function user_name($data){
        if($data and preg_match('|^[A-Z0-9]+$|i', $data)){
                return true;
    } else{
        return false;
            
        
    }
}
function text($data){
        if($data){
                return true;
    } else{
        return false;
    }
}
function img($data){
        if($data){
            $type = strtolower(substr(strrchr($_FILES['imgFile']['name'],"."),1));
            if ( $type == 'png' or $type == 'jpg' or $type == 'gif' or $type == 'jpeg' and $_FILES['imgFile']['size'] < 8000000){
                 return true;
            }
               
        } else{
            return false;
        }
}


function validateForm($dataWithRules, $data){
    $errorForms = [];
    $fields = array_keys($dataWithRules);
    
    foreach($fields as $fieldName){
        $fieldData = $data[$fieldName];
       $rules = $dataWithRules[$fieldName];
        foreach($rules as $ruleName){
            if(!$ruleName($fieldData)){
                 $errorForms[$fieldName][] = $ruleName; 
            }
            
            
            
        }
    }
    return $errorForms;
}