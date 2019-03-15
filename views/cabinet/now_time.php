<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Обновление времени | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
        $db = Db::getConnection();
        $query = $db->prepare("SELECT header, author FROM $type_ads WHERE author=:id and id = :ads_id ");
        $params = [
            'id' => $_SESSION['id'],
            'ads_id' => $ads_id
                ];
        $query -> execute($params);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query -> fetch();
        
        if(isset($result['header']))
        {
                    // Берем данные о времени
                    $query_1 = $db->prepare("SELECT time FROM $type_ads WHERE id=:ads_id AND author = :id");
                    $params_1 = [
                    'ads_id' => $ads_id,
                    'id' => $_SESSION['id']
                    ];
                    $query_1 -> execute($params_1);
                    $query_1->setFetchMode(PDO::FETCH_ASSOC);
                    $result_1 = $query_1 -> fetch();

                    if( (time() - $result_1['time']) > 72000)
                    {

                        // Обновление времени объявления
                        $query_2 = $db->prepare("UPDATE $type_ads SET time = :time WHERE id = :ads_id and author = :now_id;");
                        $params_2 = [
                            'time' => time(),
                            'now_id' => $_SESSION['id'],
                            'ads_id' => $ads_id
                                ];
                        $query_2 -> execute($params_2);



                        $message = "Время размещения объявления успешно обновлено";
                        $message_array = array (
                        "Обновление времени",
                        "$message",
                        "yellow",
                        "my_cabinet/".$type_ads."/1",
                        "Отлично",
                        );
                    }
                    else
                    {
                        $message = "С момента последнего обновления / размещения еще не прошло 20 часов.";
                        $message_array = array (
                        "Обновление времени",
                        "$message",
                        "red",
                        "my_cabinet/".$type_ads."/1",
                        "Вернуться назад",
                        );  
                    }
                
                
                

        }
        else
        {
            header('Location: /404');
            exit;             
        }
            
            plus_window_message($message_array);
        ?>
      

    </div>

    <?php require_once(ROOT.'/components/Footer.php'); ?>
  </body>
</html>


