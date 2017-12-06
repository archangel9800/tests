function contentFunc(){ };
//    предосмотр картинки
     $("body").on('click',"#content #predImg", review); 
    function review(event){
    event.preventDefault();
        if($('#content #exampleInputEmail1').val() && $('#content #user_name').val() && $('#content #task_name').val() && 
           $('#content #realization_date').val() && $('#content #task_description').val() && $('#content #imgFile').val() && /^[a-zA-Z0-9_]+$/.test($('#content #user_name').val())){
            $('#content .res_watch .create_email').html($('#content #exampleInputEmail1').val());
           $('#content .res_watch .create_name').html($('#content #user_name').val());
           $('#content .res_watch .task_nm').html($('#content #task_name').val());
           $('#content .res_watch .real_date').html($('#content #realization_date').val());
           var date = new Date();
            function getZero($num){
                if($num <=10){
                    return "0"+$num;
                }else{
                    return $num;
                }
            };
           $('#content .res_watch .create_date').html(getZero(date.getDate())+'-'+getZero(date.getMonth())+'-'+date.getFullYear());
            $('#content .res_watch .task_descr').html($('#content #task_description').val());
           $dataaray = new FormData($('#content form')[0]);
            $dataaray.append('action', 'cutForReview');
             $.ajax({
                url: "core/library/review.php",
                contentType: false,
                processData: false, 
                type: 'POST',
                data: $dataaray,
                success: function(data){
                    if(data != 'bad_img'){
                        $('#content .res_watch').css({
                           display: 'block',
                       });
                      $('#content .res_watch .img_box img').attr('src', data);    
                    }else{
                        $('#content .res_watch').css({
                           display: 'none',
                       });
                    }
            }
        }); 
            $('#content .review_err').html('');
        } else{
            $('#content .res_watch').css({
                           display: 'none',
                       });
            $('#content .review_err').html('Не заполненны поля ввода и не добавлена картинка!');     
        }
       
}
 



    