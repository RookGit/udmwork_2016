<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Проверка регистрации | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT . '/components/Head_files.php'); ?>
</head>

<body>
<?php require_once(ROOT . '/components/Header.php'); ?>

<div class="container-fluid">
    <?php

    $login_post = mb_strimwidth($_POST['login'], 0, 50, "");
    $password_post = md5(mb_strimwidth($_POST['password'], 0, 10, ""));

    if ($login_post != null and $password_post != null) {
        $db = Db::getConnection();
        $query = $db->prepare("SELECT id, timebonus FROM users WHERE email=:email and pass=:password ");
        $params = ['email' => $login_post, 'password' => $password_post];
        $query->execute($params);
        $result = $query->fetch();

        if (!empty($result['id'])) {
            $_SESSION['id'] = $result['id'];
            $message = "Вы успешно вошли в свой аккаунт";
            if (time() - $result['timebonus'] > 72000) {
                ?>
                <script>window.location.href = "/plus_bonus"</script>
            <?php
            } else {
            ?>
                <script>window.location.href = "/my_cabinet/resume/1"</script>
                <?php
            }
            exit;

        } else {
            $message = "Email, либо пароль - не верные";
        }
    } else {
        $message = "Заполните все обязательные данные для входа";
    }


    $color_style = "yellow";
    $message_array = array(
        "Процесс входа",

        "$message",

        "$color_style",

        "login",

        "Вернуться назад",
    );

    plus_window_message($message_array);
    ?>


</div>

<?php require_once(ROOT . '/components/Footer.php'); ?>

</body>
</html>