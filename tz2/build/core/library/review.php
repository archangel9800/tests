<?php
require_once 'loadTask.php';
require_once 'validator.php';

switch ( $_POST['action'] )
{   
    case 'cutForReview':
        cutForReview();
        break;
}
//обрезка картинки для предосмотра
function cutForReview(){
     $type = strtolower(substr(strrchr($_FILES['imgFile']['name'],"."),1));
    if ( $type == 'png' or $type == 'jpg' or $type == 'gif' or $type == 'jpeg' and $_FILES['imgFile']['size'] < 8000000){
    $dir = '../../tmp/';
        if( ! is_dir( $dir ) ) mkdir( $dir, 0777 );  
        $list = scandir($dir);
        unset($list[0],$list[1]);
        cleanDir($dir);
        $valType = strrchr($_FILES['imgFile']['name'], '.'); 
        move_uploaded_file($_FILES['imgFile']['tmp_name'], $dir.'pic'.$valType);
        $pic = $dir.'pic'.$valType;
        $filename = $id.uniqid();
        $img320x240 = $dir.$filename.'img320x240'.$valType;
        image_resize($pic, $img320x240, 320, 240, $crop=1);
    echo 'tmp/'.$filename.'img320x240'.$valType;
    
    }else{
        echo 'bad_img';
    }
    
}


?>