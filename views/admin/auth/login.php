<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Авторизация | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU">
    <meta name="author" content="">
    <title>Вход в аккаунт | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT . '/components/Head_files.php'); ?>
</head>

<body>
<?php require_once(ROOT . '/components/Header_admin.php'); ?>

<div class="container-fluid">
    <?php


    $color_style = "white";
    $message_array = array(
        "<span class='form_active'>Вход</span>",

        '<form class="form_login" role="form" method="POST" action="' . $_SERVER['REQUEST_URI'] . '">
                   <div class="form-group">
                        <label for="exampleInputEmail">Ваш login:</label>
                        <input name="login" type="text" class="form-control form-input" id="exampleInputEmail" placeholder="Введите login">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Пароль:</label>
                        <input name="password" type="password" class="form-control form-input" id="exampleInputPassword" placeholder="Введите пароль">
                    </div>
                    <button type="submit" class="btn btn-default button_message button_' . $color_style . '">Войти</button>
                </form>',

        "$color_style",
    );

    plus_window_message($message_array);
    ?>


</div>

</body>
</html>