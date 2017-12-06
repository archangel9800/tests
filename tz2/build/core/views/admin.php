<?php renderView('html.header', []); ?>
    <section id="header_adm" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <button id="adminka_exit" class="enter_exit_btn"><a href="<?=BASE_URL?>/admin/logout" class="average_text">Выход</a></button>
    </section>
    <section id="content_adm">
        <form method="post">
            <div class="left_side no_p_m col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="users_list" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="average_text">Список пользователей</p>
                    <select class="average_text" name="sort">
                        <?php show_sort_list(); ?>
                    </select>
                    <input type="submit" class="average_text" value="Сортировать">
                    <select class="average_text col-xs-12 col-sm-12 col-md-12 col-lg-12" id="id_user" size="30" name="id_user">
                        <?php show_users_list(); ?>
                    </select>
                </div>
                <div id="task_list" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p class="average_text">Список задач</p>
                    <select class="average_text" name="sort_task">
                        <?php show_sort_task_list(); ?>
                    </select>
                    <input type="submit" class="average_text" value="Выбрать">
                    <select class="average_text col-xs-12 col-sm-12 col-md-12 col-lg-12" id="id_task" size="30" name="id_task">
                        <?php show_task_list(); ?>
                    </select>
                </div>
            </div>
            <div class="right_side no_p_m col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div id="task_redactor" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php change_status(); ?>
                    <?php show_one_task(); ?>       
                </div>
            </div>
        </form>
    </section>
    <?php renderView('html.footer', []); ?>