<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Удаление объявления | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
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
            'ads_id' => $ags_id
                ];
        $query -> execute($params);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query -> fetch();
        
        if(isset($result['header']))
        {
            if($agree == 0) 
                {
                    $message = "Вы точно хотите удалить объявление № ".$ags_id."?<br>"
                            . "(Заголовок: ".$result['header'].")";
                    $message_array = array (
                        "Удаление объявления",
                        "$message",
                        "yellow",
                        "delete/".$type_ads."/".$ags_id."/1",
                        "Да, точно",
                        "my_cabinet/".$type_ads."/1",
                        "Нет",
                    );
                }
                else
                {
                    // Удаление из основной бд
                    $query_2 = $db->prepare("DELETE FROM $type_ads
                        WHERE author = :id and id = :ads_id;");
                    $params_2 = [
                        'id' => $_SESSION['id'],
                        'ads_id' => $ags_id
                            ];
                    $query_2 -> execute($params_2);


                    $type_ads_plus = $type_ads."_about";
                    // Удаление из вспомогательной бд
                    $query_3 = $db->prepare("DELETE FROM $type_ads_plus
                        WHERE id = :ads_id;");
                    $params_3 = [
                        'ads_id' => $ags_id
                            ];
                    $query_3 -> execute($params_3);


                    $type_ads_plus2 = "my_".$type_ads;
                    // Удаление из данных пользователя
                    $query_4 = $db->prepare("UPDATE users SET $type_ads_plus2 = $type_ads_plus2 - 1 WHERE id = :id;");
                    $params_4 = [
                        'id' => $_SESSION['id']
                    ];
                    $query_4 -> execute($params_4);


                    $message = "Объявление успешно удалено";
                    $message_array = array (
                    "Удаление объявления",
                    "$message",
                    "yellow",
                    "my_cabinet/".$type_ads."/1",
                    "Отлично",
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="/template/js/bootstrap.min.js"></script>
  </body>
</html>


