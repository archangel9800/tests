<?php
//контроллер главной страницы
function action_index(){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      
    $formData = [
      'user_name' => getSaveData(htmlspecialchars(trim($_POST['user_name']))),
      'email' => getSaveData(trim($_POST['email'])),
      'task_name' => getSaveData(htmlspecialchars(trim($_POST['task_name']))),
      'task_description' => getSaveData(htmlspecialchars(trim($_POST['task_description']))),
      'realization_date' => getSaveData(htmlspecialchars(trim($_POST['realization_date']))),
      'img' => $_FILES,
    ];

      $rules = [
        'user_name' => ['required', 'user_name'],  
        'email' => ['required','email'],
        'task_name' => ['required','text'],
        'task_description' => ['required','text'],
        'realization_date' => ['required','text'],
        'img' => ['required','img'],
      ];
      $errors = validateForm($rules, $formData);
        
      if(empty($errors)){
         loadTask($formData);
      }
  }
  
    
    renderView('index', $errors);
};
//функция успешного создания задачи
function action_success(){
 renderView('success', []);
    
};



