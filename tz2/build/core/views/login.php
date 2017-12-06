<?php renderView('html.header', []); ?>
    <button id="on_main" class="enter_exit_btn"><a href="<?=BASE_URL.'/main'?>" class="average_text">На главную</a></button>
    <form method="post">
        <div class="form-group col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xs-offset-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
            <label class="average_text" for="login">Login</label>
            <input type="text" class="inputs_height average_text form-control" id="login" name="login" value="<?= (isset($_POST['login'])) ? $_POST['login'] : ''?>">
        </div>
        <div class="form-group col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xs-offset-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
            <label class="average_text" for="password">Password</label>
            <input type="password" class="inputs_height average_text form-control" id="password" name="password" value="<?= (isset($_POST['password'])) ? $_POST['password'] : ''?>">
        </div>
        <div id="btn_block" class="col-xs-6 col-sm-4 col-md-4 col-lg-4 col-xs-offset-3 col-sm-offset-4 col-md-offset-4 col-lg-offset-4">
            <button class="average_text col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xs-offset-3 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">Login</button>
        </div>
    </form>
    <?php renderView('html.footer', []); ?>