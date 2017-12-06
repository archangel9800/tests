<?php
//контроллер админ панели
function action_index(){
     if(is_auth() and is_admin()){   
      renderView('admin', []);
  }  else{
     if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $formData = [
          'login' => getSaveData(htmlspecialchars(trim($_POST['login']))),
          'password' => getSaveData(trim($_POST['password'])),
        ];
        $formData['password']  = md5($formData['password']);
          $sql = "SELECT * FROM user WHERE user_name='{$formData['login']}' and password='{$formData['password']}'";
        $res = selectData($sql);
        if($res->num_rows === 0){
              echo 'incorect login or password';
          } else {
                $_SESSION['user'] = mysqli_fetch_assoc($res);
                header('Location: '.BASE_URL.'/admin');
         }
    }
 renderView('login', []);
  } 
};
//функция выхода
function action_logout(){
    session_unset();
    session_destroy();
    header('Location: '.BASE_URL.'/admin');
    
}