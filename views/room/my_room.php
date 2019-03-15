<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Личный кабинет | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT . '/components/Head_files.php'); ?>
    <script src="/template/js/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="/template/js/timer.js"></script>
</head>

<body onload="start()">


<?php
require_once(ROOT . '/components/Header.php');
echo '<script language="javascript">var sec = ' . (72000 - time() + $result['timebonus']) . ';</script>';
?>


<div class="container-fluid cabinet_window">
    <div class="row">

        <!-- Left menu-panel -->
        <div class="col-xs-12 col-sm-3">
            <div class="menu_panel_info">

                <?php
                if ($result['GenVerAge'][1] == "0")
                    echo "Важная информация:<a class='btn btn-block btn-danger margin_2' href='/send_verification'>Подтвердить email</a>";

                $account = $result['vk'] > 0 ? "Вконтакте: id" . $result['vk'] : $result['email'];

                echo "Аккаунт:<a class='btn btn-danger margin_2 button_action'>{$account}</a></br> "
                    . "Основная информация:
                    <a class='btn btn-info margin_2 button_action' >Баланс: <span class='badge'>{$result['balance']} <img class='money_img' width='11' height='11' src='/template/images/сoin.png'/></span></a> "
                    . "<br class='br_margin' /><a class='btn btn-success margin_2 button_action'>Осталось размещений: <span class='badge'>{$result['rest']}</span></a> "; ?>
                <a id='timer' href='/plus_bonus' class='btn btn-primary margin_3 button_action' href='PlusBonus'>Проверка
                    бонуса</a>

                <?php if($_SESSION['id'] == 1)
                    echo "Управление сайтом:<br/><a id='timer' href='/". Config::get_data("admin_token_prefix").'admin_panel_main'."/main' class='btn btn-success margin_3 button_action' href='PlusBonus'>Админ-панель</a>";
                    ?>
            </div>
        </div>

        <!-- Left panel -->
        <div class="col-xs-12 col-sm-9 menu_panel">

            <div class="tab_panel">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="active"><a class="tabs" data-toggle="tab" href="#panel1">Мой объявления
                            (<?php echo $result['my_resume'] + $result['my_jobs'] + $result['my_services']; ?>)</a></li>
                    <li><a class="tabs" data-toggle="tab" href="#panel4">Добавить объявление</a></li>
                    <li><a class="tabs" data-toggle="tab" href="#panel3">Прочее</a></li>
                    <?php if ($result['vk'] == "0")
                        echo '<li><a class="tabs" href="/exit">Выход</a></li>';
                    ?>
                </ul>
            </div>
            <div class="tab-content menu_tabs">

                <div id="panel1" class="tab-pane fade in active">
                    <?php
                    if ($result['moder'] == 8) {
                        ?>

                        <div class="suspicious_ads">ВНИМАНИЕ!!! ВАШИ ОБЪЯВЛЕНИЯ ПОМЕЧЕНЫ МОДЕРАТОРОМ САЙТА, КАК
                            ПОДОЗРИТЕЛЬНЫЕ!<br>Если это сделано не справедливо, свяжитесь с нами:<br>
                            <a class="footer_link" href="https://vk.com/id440434126">https://vk.com/id440434126</a>
                        </div>

                        <?php
                    }

                    ?>
                    <?php
                    $moder_status = $result['moder'];
                    if ($moder_status == 2) {
                        ?>

                        <div class="suspicious_ads">ВАШ АККАУНТ ВНЕСЕН В ЧЕРНЫЙ СПИСОК ИЗ-ЗА НАРУШЕНИЙ ПРАВИЛ САЙТА!<br>Если
                            это сделано не справедливо, свяжитесь с нами:<br>
                            <a class="footer_link" href="https://vk.com/id440434126">https://vk.com/id440434126</a>
                        </div>

                        <?php
                    }

                    ?>
                    <h4>Показать:</h4>


                    <div class='table_link_field'>
                        <div class='table_link_cabinet'>
                            <a id='cabinet_resume' href='/my_cabinet/resume/1' class='cabinet_link'>Мои резюме
                                (<?php echo $result['my_resume']; ?>)</a>
                        </div>

                        <div class='table_link_cabinet'>
                            <a id='cabinet_jobs' href='/my_cabinet/jobs/1' class='cabinet_link'>Мои вакансии
                                (<?php echo $result['my_jobs']; ?>)</a>
                        </div>

                        <div class='table_link_cabinet'>
                            <a id='cabinet_service' href='/my_cabinet/services/1' class='cabinet_link'>Мои услуги
                                (<?php echo $result['my_services']; ?>)</a>
                        </div>
                    </div>
                    <?php
                    $query_2 = $db->prepare("SELECT * FROM $table WHERE author = :id and moder != 6 ORDER BY `time` DESC LIMIT " . ($page * 10 - 10) . ",10");
                    $params_2 = ['id' => $_SESSION['id']];
                    $query_2->execute($params_2);
                    $query_2->setFetchMode(PDO::FETCH_ASSOC);
                    $result_2 = $query_2->fetchAll();

                    if ($result_2 != null && $moder_status == 1) { ?>

                        <br>
                        <h4>Дополнительные возможности: </h4>
                        <a class="btn btn-default" href="#" data-toggle="modal" data-target=".bd-example-modal-sm">Обновить
                            время во
                            всех объявлениях</a><br>
                    <?php } ?>
                    <br><h4>Мои объявления: </h4>

                    <?php

                    foreach ($result_2 as &$value) {
                    $edited_value = Ads_check($value, $table);

                    echo "<a class='window_link' href='#'>"
                        . "<div class='window_ads_full'>"
                        . "<img class='pull-left ads_img' src='/template/images/category/" . $value['type'] . ".png' />"
                        . "<div class='ads_info'><font style='background-color: #" . $value['color'] . ";' class='head_text_info'>Заголовок: <b>" . $value['header'] . "</b></font><br />"
                        . "Объявление в: {$edited_value['city']} <span class='br'> Просмотров: " . $value['see'] . "<img class='eye_image' width='14' height='14' src='/template/images/eye.png'/></span> <br>"
                        . "<font class='big_text_info'>Зарплата: {$edited_value['payment']} <span class='br'> Размещено: " . date('d.m.Y H:i:s', $value['time'] + Config::get_data("plus_time")) . "</span></font><br />"
                        . "<div class='ads_link_site_field'>"
                        . "<a class='ads_link' href='/about/$table/{$value['id']}'>Посмотреть</a>"
                        . "<a class='ads_link' href='/editing_ads/$table/{$value['id']}'>Редактировать</a>";

                    if ($moder_status == 1) {
                        echo "<a class='ads_link' href='/now_time/$table/{$value['id']}'>Обновить время</a>"
                            . "<a class='ads_link' href='/vip_state/$table/{$value['id']}'>Добавить в VIP-зону</a>";
                        if ($value['color'] == "ffff00")
                            echo "<a class='ads_link'>(Выделено)</a>";
                        else
                            echo "<a class='ads_link' href='/highlight/$table/" . $value['id'] . "'>Выделить</a>";
                    }

                    echo "<a class='ads_link' href='/delete/$table/" . $value['id'] . "'>Удалить</a>"
                        . "</div>"
                        . "<div class='dropup'>
                                    <button class='btn btn-default dropdown-toggle' type='button' id='dropdownMenu2' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    Действия
                                    <span class='caret'></span>
                                    </button>
                                    <ul class='dropdown-menu' aria-labelledby='dropdownMenu2'>
                                    <li><a class='ads_link' href='/about/$table/{$value['id']}'>Посмотреть</a></li>
                                    <li><a class='ads_link' href='/editing_ads/$table/{$value['id']}'>Редактировать</a></li>";

                    if ($moder_status == 1) {
                        echo "<li><a class='ads_link' href='/now_time/$table/{$value['id']}'>Обновить время</a></li>
                                    <li><a class='ads_link' href='/vip_state/$table/{$value['id']}}'>Добавить в VIP-зону</a></li>";
                        if ($value['color'] == "ffff00")
                            echo "<li><a class='ads_link'>(Выделено)</a></li>";
                        else
                            echo "<li><a class='ads_link' href='/highlight/$table/{$value['id']}'>Выделить</a></li>";
                    }

                    ?>


                    <li><a class='ads_link' href='/delete/<?= $table ?>/<?= $value['id'] ?>'>Удалить</a></li>
                    </ul>
                </div>
            </div>
        </div>
        </a>
        <?php
        }
        if ($result_2 == null) { ?>
            <a class='window_link' href='#'>
                <div class='window_ads_full'>
                    <img width='189' height='255' class='pull-left ads_img'
                         src='/template/images/category/warning.png'/>
                    <div class='ads_info'><font class='head_text_info'><b>Вы еще не размещали объявления
                                данного
                                типа.</b></font><br/>
                        - В день можно размещать не более 3 объявлений<br/>
                        - Если не осталось размещений - получите бонус (3 размещения и 25 монет)<br/>
                        - За монеты Вы можете помещать объявление в VIP-зону и выделить его
                    </div>
                </div>
            </a>
        <?php }

        $max_page = $count = ceil($result['my_' . $table . ''] / 10); //Количество
        if ($max_page > 0) {
            echo '<div class="page_field">                
                    <ul class="pagination">
                      <li><a href="/my_cabinet/' . $table . '/1">&laquo;</a></li>';
            $i = 1;
            if ($page > 4) {
                $i = $page - 2;
                $plus = 2;
                if ($page + 2 > $count) {
                    $plus = $count - $page;
                    $i = $count - 4;
                }
                $count = $page + $plus;
            }

            if ($count - $i > 5)
                $count = $i + 4;


            while ($i <= $count) {
                if ($page == $i)
                    echo '<li class="active_page" ><a href="/my_cabinet/' . $table . '/' . $i . '"><ins>' . $i . '</ins></a></li>';
                else
                    echo '<li><a href="/my_cabinet/' . $table . '/' . $i . '">' . $i . '</a></li>';

                $i++;
            }

            echo '<li><a href="/my_cabinet/' . $table . '/' . $max_page . '">&raquo;</a></li>
                    </ul>
                </div>';
        }
        ?>


    </div>

    <div id="panel2" class="tab-pane fade">
        <h3>Добавить объявление:</h3>
        <div class='table_link_field'>
            <div class='table_link_cabinet'>
                <a id='cabinet_resume' href='/my_cabinet/resume/1' class='cabinet_link'>Добавить резюме</a>
            </div>

            <div class='table_link_cabinet'>
                <a id='cabinet_jobs' href='/my_cabinet/jobs/1' class='cabinet_link'>Добавить вакансию</a>
            </div>

            <div class='table_link_cabinet'>
                <a id='cabinet_service' href='/my_cabinet/services/1' class='cabinet_link'>Добавить
                    услугу</a>
            </div>
        </div>


    </div>

    <style>
        .accordion_menu_1, .accordion_menu_2 {
            display: none;
        }

        .accordion_btn_1:hover, .accordion_btn_2:hover {
            cursor: pointer;
            text-decoration: underline;
            text-decoration-color: white;
        }
    </style>
    <div id="panel3" class="tab-pane fade">
        <h3><b>Выберите действие:</b></h3>
        <hr>
        <h3 class="accordion_btn_1" onclick="setVisibility(1)">Промокоды:</h3>
        <form class="form_login accordion_menu_1" role="form" method="POST" action="/promo_code">

            <div class="form-group">

                <label>Введите промокод:</label>
                <input maxlength="60" name="promo_post" type="text" class="form-control"
                       placeholder="Введите промокод">
            </div>

            <button type="submit" class="btn btn-default button_message button_white margin_1">
                Активировать
            </button>
        </form>

        <?php if ($result['vk'] == "0") { ?>
            <hr>
            <h3 class="accordion_btn_2" onclick="setVisibility(2)">Изменить пароль:</h3>
            <form class="form_login accordion_menu_2" role="form" method="POST" action="/new_password">

                <div class="form-group">
                    <label>Введите старый пароль (*):</label>
                    <input maxlength="10" name="password_old_post" type="password" class="form-control"
                           placeholder="Введите Ваш старый пароль">

                    <label class='margin_4'>Введите новый пароль (*):</label>
                    <input maxlength="10" name="password_new_post" type="password" class="form-control"
                           placeholder="Введите Ваш новый пароль">

                    <label class='margin_4'>Повторите новый пароль (*):</label>
                    <input maxlength="10" name="password_new_post_2" type="password" class="form-control"
                           placeholder="Повторите Ваш новый пароль">
                </div>

                <button type="submit" class="btn btn-default button_message button_white margin_1">Изменить
                    пароль
                </button>
            </form>

        <?php } ?>
    </div>

    <div id="panel4" class="tab-pane fade center">
        <h3>Тип размещаемого объявления:</h3>
        <center>
            <div class="col-xs-12 col-sm-4 col-md-4 margin_5">
                <a class='link_plus_ads' href='/plus_ads/resume'><img width="100" height="100"
                                                                      src="/template/images/category/finance.png"
                                                                      alt="Резюме"
                                                                      class="img-rounded">
                    <div class='type_ads_cabinet'>Резюме</div>
                </a>

            </div>


            <div class="col-xs-12 col-sm-4 col-md-4 margin_5">
                <a class='link_plus_ads' href='/plus_ads/jobs'><img width="100" height="100"
                                                                    src="/template/images/category/other.png"
                                                                    alt="Вакансию"
                                                                    class="img-rounded">
                    <div class='type_ads_cabinet'>Вакансия</div>
                </a>
            </div>


            <div class="col-xs-12 col-sm-4 col-md-4 margin_5">
                <a class='link_plus_ads' href='/plus_ads/services'><img width="100" height="100"
                                                                        src="/template/images/category/marketing.png"
                                                                        alt="Услугу"
                                                                        class="img-rounded">
                    <div class='type_ads_cabinet'>Услуга</div>
                </a>
            </div>

    </div>
</div>
</div>

</div>
</div>

<?php require_once(ROOT . '/components/Footer.php'); ?>


<!-- Modal window -->
<div class="modal fade bd-example-modal-sm modal_window" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Внимание</h4>
            </div>
            <div class="modal-body">
                <p class="modal_text">Обновить время во всех объявлениях данного типа?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Нет</button>
                <button type="button" onclick="ajax_refresh()" class="btn btn-primary btn_refresh">Обновить (25 <img
                            width='15' height='15'
                            src='/template/images/сoin.png'/>)
                </button>
            </div>
        </div>
    </div>
</div>

<script>

    var url = window.location.pathname;
    var link = url.split('/');
    var ajax_request = null;
    switch (link[2]) {
        case "jobs":
            $("#cabinet_jobs").addClass("active_cabinet");
            $(".modal_text").text("Обновить время всех Ваших вакансий?");
            $(".btn_refresh").attr("href", "/refresh_all_time/jobs");
            ajax_request = "jobs";
            break;

        case "resume":
            $("#cabinet_resume").addClass("active_cabinet");
            $(".modal_text").text("Обновить время всех Ваших резюме?");
            $(".btn_refresh").attr("href", "/refresh_all_time/resume");
            ajax_request = "resume";
            break;

        case "services":
            $("#cabinet_service").addClass("active_cabinet");
            $(".modal_text").text("Обновить время всех Ваших услуг?");
            $(".btn_refresh").attr("href", "/refresh_all_time/services");
            ajax_request = "services";
            break;
    }


    function ajax_refresh() {
        $.ajax({
            url: "/refresh_ads_time",
            type: "POST",
            data: ({type_ads: ajax_request}),
            dataType: "html",
            beforeSend: funcBefore,
            success: funcSuccess
        });
    }

    function funcBefore() {
        $(".modal_text").text("Проверка идентификации и баланса...");
    }

    function funcSuccess(data) {

        switch (data) {
            case "error":
                $(".modal_text").text("Запрос не корректен. Видимо кто-то балуется исходным кодом :)");
                break;

            case "error_balance":
                $(".modal_text").text("Не хватает средств на балансе");
                $(".btn-secondary").text("Закыть окно");
                $(".btn_refresh").css("display", "none");
                break;

            case "success":
                $(".modal_text").text("Обновление времени успешно, обновите страницу, чтобы увидеть результат");
                $(".btn_refresh").text("Обновить страницу");
                $(".btn-secondary").css("display", "none");
                $(".btn_refresh").attr("onclick", "refresh()");
                break;
        }
    }

    function refresh() {
        location.reload();
    }

    function setVisibility(num_accordion) {
        switch (num_accordion) {
            case 1:
                $(".accordion_menu_1").show("slow");
                $(".accordion_menu_2").hide("slow");
                $(".accordion_btn_1").attr("onclick", "setVisibility(10)");
                $(".accordion_btn_2").attr("onclick", "setVisibility(2)");
                break;

            case 10:
                $(".accordion_menu_1").hide("slow");
                $(".accordion_menu_2").hide("slow");
                $(".accordion_btn_1").attr("onclick", "setVisibility(1)");
                $(".accordion_btn_2").attr("onclick", "setVisibility(2)");
                break;

            case 2:
                $(".accordion_menu_2").show("slow");
                $(".accordion_menu_1").hide("slow");
                $(".accordion_btn_2").attr("onclick", "setVisibility(20)");
                $(".accordion_btn_1").attr("onclick", "setVisibility(1)");
                break;

            case 20:
                $(".accordion_menu_2").hide("slow");
                $(".accordion_menu_1").hide("slow");
                $(".accordion_btn_2").attr("onclick", "setVisibility(2)");
                $(".accordion_btn_1").attr("onclick", "setVisibility(1)");
                break;
        }
    }
</script>

</body>
</html>