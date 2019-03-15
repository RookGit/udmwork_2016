<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Авторизация | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU">
    <meta name="author" content="">
    <title>Админ-панель | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT . '/components/Head_files_admin.php'); ?>
    <script>
        var category = ["Объявления", "Пользователи", "Администраторы", "Реклама", "Настройки", "Статистика", "Прочее"];

        var action_arr = {
            parsing: "/parsing_vk/index.php"
        };

        jQuery(document).ready(function () {
            jQuery('.scrollbar-inner').scrollbar();
        });

        function setPanel(num_category, elem, action) {
            $(".active_category").text(category[num_category - 1]);
            $(".active_item_category").text(
                $(elem).text().trim()
            );
            $("#main_iframe").attr("src", "/views/admin/modules/" + action_arr[action]);
        }
    </script>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <div class="page_header">
            <ul class="nav field_panel_admin scrollbar-inner">

                <li class="nav-header">Навигация</li>
                <li><a class="link_of_category" href="/my_cabinet/resume/1">Назад в личный кабинет</a></li>
                <li><a class="link_of_category" href="<?php create_link("main");?>">Рабочий стол</a></li>

                <li class="nav-header">Объявления</li>
                <li><a class="link_of_category" href="<?php create_link("parsing");?>">Вакансии</a></li>

                <li class="nav-header">Прочее</li>
                <li><a class="link_of_category" href="<?php create_link("parsing");?>">Парсинг</a></li>

                <li class="nav-header">Настройки</li>
                <li><a class="link_of_category" href="<?php create_link("main_setting");?>">Основные настройки</a></li>

            </ul>

        </div>


        <div class="action_field">
            <ol class="breadcrumb">
                <?php
                if(isset($name_for_breadcrumb[$action]))
                {
                $arr_for_breadcrumb = explode("/", $name_for_breadcrumb[$action]);

                $active_item = array_pop($arr_for_breadcrumb);

                foreach ($arr_for_breadcrumb as $category)
                    echo '<li class="active_category">'.$category.'</li>';

                echo '<li class="active active_item_category">'.$active_item.'</li>';
                ?>
            </ol>

            <?php
            require_once(ROOT."/views/admin/modules$action_dir[$action]");
            }
            else
                echo '<li class="active active_item_category">Страница не найдена</li>';
            ?>


        </div>


    </div>

</body>
</html>