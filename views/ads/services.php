<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Услуги | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU">
    <meta name="author" content="">
    <title>Услуги | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT . '/components/Head_files.php'); ?>
    <?php require_once(ROOT . '/components/Preloader.php'); ?>
</head>

<body class='back_ads'>

<?php require_once(ROOT . '/components/Header.php'); ?>

<div class="container-fluid cabinet_window">

    <div class="row tab-content">

        <div id="panel1" class="col-xs-12 col-sm-10 tab-pane fade in active">
            <?php


            echo '<form class="form_login" role="form" method="POST" action="/services">
                    
                     <div class="col-xs-12">
                     <label>Критерии поиска:</label>
                        <div class="input-group search_text_form">
                          <input name="search_post" type="text" class="form-control" placeholder="Введите текст для поиска">
                          <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">Найти</button>
                          </span>
                        </div>
                    </div>';

            echo ' <div class="form-group text-center">';
            require_once(ROOT . '/components/set_search_ads_params.php');
            echo '</div>
                    
                    </form>';

            echo "<h3>Найденные услуги:</h3>";

            foreach ($result_3 as &$value) {
                $edited_value = Ads_check($value, "services");
                echo "<a class='window_link' href='/about/services/" . $value['id'] . "'>"
                    . "<div class='vip_window_ads_full'><img src='/template/images/category/vip.png' class='type_image_vip' >"
                    . "<img class='pull-left ads_img' src='/template/images/category/" . $value['type'] . ".png' />"
                    . "<div class='ads_info'><font class='head_text_info'>Заголовок: <b>" . $value['header'] . "</b></font><br />"
                    . "Услуга в: " . $edited_value['city'] . " <span class='br'> Сфера: " . $edited_value['type'] . "</span><br />"
                    . "Просмотров: " . $value['see'] . "<img class='eye_image' width='14' height='14' src='/template/images/eye.png'/><br />"
                    . "<font class='big_text_info_vip'>Оплата: " . $edited_value['payment'] . " <span class='br'> Размещено: " . date('d.m.Y H:i:s', $value['time'] + Config::get_data("plus_time")) . "</span></font><br />"
                    . "</div>"
                    . "</div>"
                    . "</a>";
            }

            foreach ($result_2 as &$value) {
                $edited_value = Ads_check($value, "services");
                echo "<a class='window_link' href='/about/services/" . $value['id'] . "'>"
                    . "<div class='window_ads_full'>"
                    . "<img  width='189' height='255'  class='pull-left ads_img' src='/template/images/category/" . $value['type'] . ".png' />"
                    . "<div class='ads_info'><font style='background-color: #" . $value['color'] . ";' class='head_text_info'>Заголовок: <b>" . $value['header'] . "</b></font><br />"
                    . "Услуга в: " . $edited_value['city'] . " <span class='br'> Сфера: " . $edited_value['type'] . "</span><br />"
                    . "Просмотров: " . $value['see'] . "<img class='eye_image' width='14' height='14' src='/template/images/eye.png'/><br />"
                    . "<font class='big_text_info'>Оплата: " . $edited_value['payment'] . " <span class='br'> Размещено: " . date('d.m.Y H:i:s', $value['time'] + Config::get_data("plus_time")) . "</span></font><br />"
                    . "</div>"
                    . "</div>"
                    . "</a>";
            }

            if ($result_2 == null) {
                echo "<a class='window_link' href='#'>"
                    . "<div class='window_ads_full'>"
                    . "<img  width='189' height='255'  class='pull-left ads_img' src='/template/images/category/warning.png' />"
                    . "<div class='ads_info'><font class='head_text_info'><b>Объявлений не найдено. Попробуйте:</b></font><br />"
                    . "- Изменить критерии поиска<br />"
                    . "- Зайти на сайт позже и попробовать задать данные критерии еще раз<br />"
                    . "- Поискать объявления в нашей группе Вконтакте: vk.com/udmwork"
                    . "</div>"
                    . "</div>"
                    . "</a>";
            }
            ?>


            <?php
            $page_type = "services";
            require_once(ROOT . '/components/generate_count_pages.php');
            ?>

        </div>

        <?php require_once(ROOT . '/components/advertising.html'); ?>

    </div>
</div>

<?php require_once(ROOT . '/components/Footer.php'); ?>
</body>
</html>