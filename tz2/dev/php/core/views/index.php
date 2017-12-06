<?php renderView('html.header', []); ?>
    <section id="header">
        <button id="adminka_enter" class="enter_exit_btn"><a href="<?=BASE_URL?>/admin" class="average_text">Админка</a></button>
        <h1 class="big_text no_p_m">Приложение-задачник</h1>
        <div class="clear"></div>
    </section>
    <section id="content">
        <div class="add_menu no_p_m col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <p class="align_center average_text">Добавление задач</p>
            <p class="text_err align_center average_text no_p_m">
                <?php loadErrors($formErrors); ?>
            </p>
            <p class="text_err review_err align_center average_text no_p_m"></p>
            <form enctype="multipart/form-data" role="form" method="post">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label class="average_text" for="exampleInputEmail1">Email:</label>
                    <input type="email" placeholder="example@gmail.com" class="inputs_height average_text form-control <?= (isset($formErrors['email'])) ? 'err' : ''?>" id="exampleInputEmail1" name="email" value="<?= (isset($_POST['email'])) ? $_POST['email'] : ''?>">
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label class="average_text" for="user_name">Имя пользователя:</label>
                    <input type="text" placeholder="На англ." class="inputs_height average_text form-control <?= (isset($formErrors['user_name'])) ? 'err' : ''?>" id="user_name" name="user_name" value="<?= (isset($_POST['user_name'])) ? $_POST['user_name'] : ''?>">
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6 clear_both">
                    <label class="average_text" for="task_name">Название задачи:</label>
                    <input type="text" class="inputs_height average_text form-control <?= (isset($formErrors['task_name'])) ? 'err' : ''?>" id="task_name" name="task_name" value="<?= (isset($_POST['task_name'])) ? $_POST['task_name'] : ''?>">
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label class="average_text" for="realization_date">Дата выполнения:</label>
                    <input type="date" placeholder="01-01-1900" class="inputs_height average_text form-control <?= (isset($formErrors['realization_date'])) ? 'err' : ''?>" id="realization_date" name="realization_date" value="<?= (isset($_POST['realization_date'])) ? $_POST['realization_date'] : ''?>">
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label class="average_text" for="task_description">Описание задачи:</label>
                    <textarea class="average_text form-control <?= (isset($formErrors['task_description'])) ? 'err' : ''?>" name="task_description" id="task_description">
                        <?= (isset($_POST['task_description'])) ? $_POST['task_description'] : ''?>
                    </textarea>
                </div>
                <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <label class="average_text" for="imgFile">Картинка (не меньше 320х240)</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="8000000" />
                    <input type="file" id="imgFile" name="imgFile" class="average_text">
                </div>
                <div id="btns" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <button type="submit" class="average_text btn btn-default col-xs-offset-1 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Отправить</button>
                    <button type="submit" id="predImg" class="average_text btn btn-default col-xs-offset-1 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">Предосмотр</button>
                </div>
            </form>
        </div>
        <div class="res_watch no_p_m col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <p class="align_center average_text">Предосмотр</p>
            <div class="img_box col-xs-8 col-sm-8 col-md-8 col-lg-8 col-xs-offset-2 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">
                <img src="" alt="#">
            </div>
            <p class="average_text">Email: <span class="create_email average_text"></span></p>
            <p class="average_text">Имя пользователя: <span class="create_name average_text"></span></p>
            <p class="average_text">Дата создания: <span class="create_date average_text"></span></p>
            <p class="average_text">Дата выполнения: <span class="real_date average_text"></span></p>
            <p class="average_text">Название задачи: <span class="task_nm average_text"></span></p>
            <p class="average_text">Описание задачи:
                <span class="task_descr average_text"></span> </p>
        </div>
        <div class="clear"></div>
    </section>
    <?php renderView('html.footer', []); ?>