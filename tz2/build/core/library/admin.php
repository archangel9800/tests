<?php
//сортировка по имени и email пользователя
function show_sort_list(){
    $sort =  getSaveData(htmlspecialchars(trim($_POST['sort'])));
    if(!$sort){
       $sort = 'user_name'; 
    }
    if($sort == 'user_name'){
        echo "<option value='user_name' class='average_text' selected>Имени</option>
                <option value='email' class='average_text'>Email</option>";
    } else if($sort == 'email'){
        echo "<option value='user_name'>Имени</option>
                <option value='email' selected>Email</option>";
    }
    
}

//отображение списка пользователей
function show_users_list(){
    $sort =  getSaveData(htmlspecialchars(trim($_POST['sort'])));
    if($sort == null){
       $sort = 'user_name'; 
    }
      $id_user =  getSaveData(htmlspecialchars(trim($_POST['id_user'])));
    $sql = "SELECT * FROM user WHERE user_name != 'admin' ORDER BY $sort ASC";
          $res = selectData($sql);
    $put;
    while($row = mysqli_fetch_assoc($res)) {
        if($id_user == $row['id']){
            $put.= "<option value='".$row['id']."' class='average_text' selected onclick='form.submit()'> Email: ".$row['email']." Пользователь: ".$row['user_name']."</option>";
        }else{
           $put.= "<option value='".$row['id']."' class='average_text' onclick='form.submit()'> Email: ".$row['email']." Пользователь: ".$row['user_name']."</option>"; 
        }
    }
    echo $put;
    
}

//Отображение выполненых и не выполненых задач
function show_sort_task_list(){
    $sort =  getSaveData(htmlspecialchars(trim($_POST['sort_task'])));
    if(!$sort){
       $sort = 'not'; 
    }

    if($sort == 'not'){
        echo "<option value='not' class='average_text' selected>Не выполненые</option>
                <option value='yes' class='average_text'>Выполненые</option>";
    } else if($sort == 'yes'){
        echo "<option value='not'>Не выполненые</option>
                <option value='yes' selected>Выполненые</option>";
    }
    
}


//отображение списка задач конкретного пользователя
function show_task_list(){
    $sort =  getSaveData(htmlspecialchars(trim($_POST['sort_task'])));
    
    if(!$sort){
       $sort = 'not'; 
    }
      $id_task =  getSaveData(htmlspecialchars(trim($_POST['id_task'])));
      $id_user =  getSaveData(htmlspecialchars(trim($_POST['id_user'])));
    echo $id_task;
    if($id_user){
         $sql = "SELECT * FROM task WHERE status = '$sort' AND author_id = $id_user";
        
          echo $sql;
    $res = selectData($sql);
    $put;
    while($row = mysqli_fetch_assoc($res)) {
        if($id_task == $row['id']){
           $put.= "<option value='".$row['id']."' class='average_text' selected onclick='form.submit()'> Задача: ".$row['task_name']." Выполнить: ".substr($row['pubdate'], 0, 10)." по ".$row['realization_date']."</option>";
        }else{
           $put.= "<option value='".$row['id']."' class='average_text' onclick='form.submit()'> Задача: ".$row['task_name']." Выполнить: ".substr($row['pubdate'], 0, 10)." по ".$row['realization_date']."</option>";
        }        
    }
    echo $put;
        
        
        
    }
  
    
}

//изменение статуса задачи
function change_status(){
    $id_task =  getSaveData(htmlspecialchars(trim($_POST['id_task'])));
      $checkStatus =  getSaveData(htmlspecialchars(trim($_POST['checkStatus'])));
    if($id_task){
        
         $sql1 = "SELECT * FROM task WHERE id = '$id_task'";
    $res2 = selectData($sql1);
        while($row = mysqli_fetch_assoc($res2)) {
            if($checkStatus and $checkStatus != $row['status']){
               $sql3 = "UPDATE `task` SET `status`= '$checkStatus' WHERE `id` = '$id_task'"; 
                insertUpdateDelete($sql3);
            }
        }
    $sql = "SELECT * FROM task WHERE id = '$id_task'";
    $res = selectData($sql);
    $put;
    while($row = mysqli_fetch_assoc($res)) {
        $put.= "<p class='align_center average_text'>Статус</p>"; 
        if($row['status'] == 'not'){
            $put.=  "
            <div id='check_Status' class='col-xs-5 col-sm-5 col-md-5 col-lg-4'>
            <label class='radio average_text'>
              <input type='radio' name='checkStatus' id='optionsRadios1' value='not' checked>
               Не выполнен
            </label>
            <label class='radio average_text'>
              <input type='radio' name='checkStatus' id='optionsRadios2' value='yes'>
              Выполнен
            </label>
            </div>
            ";
        } else if($row['status'] == 'yes'){
            $put.=  "
            <div id='check_Status' class='col-xs-5 col-sm-5 col-md-5 col-lg-4'>
            <label class='radio average_text'>
              <input type='radio' name='checkStatus' id='optionsRadios1' value='not'>
               Не выполнен
            </label>
            <label class='radio average_text'>
              <input type='radio' name='checkStatus' id='optionsRadios2' value='yes' checked>
              Выполнен
            </label>
            </div>
            ";
        } 
        $put.=  "
        <button class='average_text'>Сменить статус</button>";
        $put.= "<div class='clear'></div>";
    }
        echo $put;
}
}






//отображение всей задачи и редактирование ее
function show_one_task(){
    $id_task =  getSaveData(htmlspecialchars(trim($_POST['id_task'])));
    $task_redaktor =  getSaveData(htmlspecialchars(trim($_POST['task_redaktor'])));
    if($task_redaktor and $id_task){
          $sql4 = "UPDATE `task` SET `task_description`= '$task_redaktor' WHERE `id` = '$id_task'"; 
                insertUpdateDelete($sql4);
    }
    
    
    
      $id_task =  getSaveData(htmlspecialchars(trim($_POST['id_task'])));
    if($id_task){
         $sql = "SELECT * FROM task WHERE id = '$id_task'";
    $res = selectData($sql);
    $put;
    while($row = mysqli_fetch_assoc($res)) {
        $sql2 = "SELECT * FROM user WHERE id = '{$row['author_id']}'";
        $res2 = selectData($sql2);
        while($row2 = mysqli_fetch_assoc($res2)) { 
        $put.= "<p class='align_center average_text'>Задача</p>"; 
         $put.=  "<div class='img_box col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3'>
            <img src='".$row['imgFile']."' alt='".$row['task_name']."'>
        </div>";
            $put.= "<div class='clear'></div>"; 
            $put.= "<p class='average_text'>Email: ".$row2['email']."</p>"; 
            $put.= "<p class='average_text'>Имя пользователя: ".$row2['user_name']."</p>"; 
            $put.= "<p class='average_text'>Дата создания: ".substr($row['pubdate'], 0, -9)."</p>"; 
            $put.= "<p class='average_text'>Дата выполнения: ".$row['realization_date']."</p>"; 
            $put.= "<p class='average_text'>Название задачи: ".$row['task_name']."</p>"; 
            $put.= "<p class='average_text'>Описание задачи:</p>"; 
            $put.= "<textarea class='average_text form-control' name='task_redaktor'> ".$row['task_description']."</textarea>"; 
            $put.= "<button class='average_text'>Редактировать</button>"; 
        }  
    }
    echo $put;  
    }
  
    
}



?>