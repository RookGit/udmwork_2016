<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Страница не найдена | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
            $message_array = array (
                "Ошибка",
                "Данная страница не найдена",
                "red",
                "hello",
                "Вернуться на сайт",
            );
            
            plus_window_message($message_array);
        ?>
      

    </div>

    <?php require_once(ROOT.'/components/Footer.php'); ?>
  </body>
</html>