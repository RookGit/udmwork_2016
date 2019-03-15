<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ошибка авторизации | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <link rel="shortcut icon" href="template/images/favicon.ico" type="image/x-icon">
      <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
            $message_array = array (
                "Ошибка",
                "Чтобы просматривать данную страницу - авторизуйтсь",
                "red",
                "login",
                "Авторизоваться",
            );
            
            plus_window_message($message_array);
        ?>
      

    </div>

    <?php require_once(ROOT.'/components/Footer.php'); ?>
  </body>
</html>