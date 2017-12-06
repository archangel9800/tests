<?php
//функция добавления задачи в бд
    function loadTask($formData){
        $dir = 'tmp/';
          cleanDir($dir);
          $sql = "SELECT id FROM user WHERE user_name='{$formData['user_name']}' or email='{$formData['email']}'";
          $res = selectData($sql);
          if($res->num_rows == 0){
             $sql = "INSERT INTO `user`(`user_name`, `email`) VALUES ('{$formData['user_name']}', '{$formData['email']}')";
             $sql1 = "SELECT id FROM user WHERE email='{$formData['email']}' or user_name='{$formData['user_name']}'";
                if(insertUpdateDelete($sql) and selectData($sql1)){
                     $id = mysqli_fetch_assoc(selectData($sql1))['id'];
                            if( ! is_dir( $dir ) ) mkdir( $dir, 0777 );  
                            $list = scandir($dir);
                            unset($list[0],$list[1]);
                            $valType = strrchr($formData['img']['imgFile']['name'], '.'); 
                            move_uploaded_file($formData['img']['imgFile']['tmp_name'], $dir.'pic'.$valType);
                            $pic = $dir.'pic'.$valType;
                            $dest = 'img/img/taskImg/';
                            $filename = $id.uniqid();
                            $img320x240 = $dest.$filename.'img320x240'.$valType;
                            image_resize($pic, $img320x240, 320, 240, $crop=1);
                     $sql2 = "INSERT INTO `task` (`author_id`, `task_name`, `task_description`, `imgFile`, `realization_date`) VALUES ('{$id}', '{$formData['task_name']}', '{$formData['task_description']}', '{$img320x240}', '{$formData['realization_date']}')";
                    
                        if(insertUpdateDelete($sql2)){
                            cleanDir($dir);
                                header("location: ".BASE_URL."/main/success");
                        }
                }
          } else {
                   $sql1 = "SELECT id FROM user WHERE email='{$formData['email']}' or user_name='{$formData['user_name']}'";
                if(selectData($sql1)){
                     $id = mysqli_fetch_assoc(selectData($sql1))['id'];
                            if( ! is_dir( $dir ) ) mkdir( $dir, 0777 );  
                            $list = scandir($dir);
                            unset($list[0],$list[1]);
                            $valType = strrchr($formData['img']['imgFile']['name'], '.'); 
                            move_uploaded_file($formData['img']['imgFile']['tmp_name'], $dir.'pic'.$valType);
                            $pic = $dir.'pic'.$valType;
                            $dest = 'img/img/taskImg/';
                            $filename = $id.uniqid();
                            $img320x240 = $dest.$filename.'img320x240'.$valType;
                            image_resize($pic, $img320x240, 320, 240, $crop=1);
                     $sql2 = "INSERT INTO `task` (`author_id`, `task_name`, `task_description`, `imgFile`, `realization_date`) VALUES ('{$id}', '{$formData['task_name']}', '{$formData['task_description']}', '{$img320x240}', '{$formData['realization_date']}')";
                        if(insertUpdateDelete($sql2)){
                            cleanDir($dir);
                                header("location: ".BASE_URL."/main/success");
                        }
                }
            }
    }






//отображение ошибок при неправильном вводе
function loadErrors($formErrors){
    if(!empty($formErrors)){
        echo 'Не правильно введены поля: ';
    foreach ($formErrors as $key => $value){
            if($key =='user_name'){
                echo 'логина; ';
            }
            if($key == 'imgFile'){
                echo 'картинки; ';
            }
            if($key == 'email'){
                echo 'email; ';
            }
            if($key == 'task_name'){
                echo 'названия задачи; ';
            }
            if($key == 'realization_date'){
                echo 'даты; ';
            }
            if($key == 'task_description'){
                echo 'описания задачи; ';
            }
            if($key == 'img'){
                echo 'загрузки изображений';
            }
        }
    }
}

//Функция обрезки картинки
function image_resize($src, $dst, $width, $height, $crop=0){
  
  if(!list($w, $h) = getimagesize($src)) return "Unsupported picture type!";

  $type = strtolower(substr(strrchr($src,"."),1));
  if($type == 'jpeg') $type = 'jpg';
  switch($type){
    case 'bmp': $img = imagecreatefromwbmp($src); break;
    case 'gif': $img = imagecreatefromgif($src); break;
    case 'jpg': $img = imagecreatefromjpeg($src); break;
    case 'png': $img = imagecreatefrompng($src); break;
    default : return "Unsupported picture type!";
  }

  // resize
  if($crop){
    if($w < $width or $h < $height) return "Picture is too small!";
    $ratio = max($width/$w, $height/$h);
    $h = $height / $ratio;
    $x = ($w - $width / $ratio) / 2;
    $w = $width / $ratio;
  }
  else{
    if($w < $width and $h < $height) return "Picture is too small!";
    $ratio = min($width/$w, $height/$h);
    $width = $w * $ratio;
    $height = $h * $ratio;
    $x = 0;
  }

  $new = imagecreatetruecolor($width, $height);

  // preserve transparency
  if($type == "gif" or $type == "png"){
    imagecolortransparent($new, imagecolorallocatealpha($new, 0, 0, 0, 127));
    imagealphablending($new, false);
    imagesavealpha($new, true);
  }

  imagecopyresampled($new, $img, 0, 0, $x, 0, $width, $height, $w, $h);

  switch($type){
    case 'bmp': imagewbmp($new, $dst); break;
    case 'gif': imagegif($new, $dst); break;
    case 'jpg': imagejpeg($new, $dst); break;
    case 'png': imagepng($new, $dst); break;
  }
  return true;
};

//очичтка директории
function cleanDir($dir) {
    $files = glob($dir."/*");
    $c = count($files);
    if (count($files) > 0) {
        foreach ($files as $file) {      
            if (file_exists($file)) {
            unlink($file);
            }   
        }
    }
};  

?>