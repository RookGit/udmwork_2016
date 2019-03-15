<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Добавление vip-статуса | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
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
            if($agree == 0) 
                {
                    $message = "Вы точно хотите добавить объявление № ".$ads_id." в vip-зону?<br />"
                            . "(Заголовок: ".$result['header'].")<br />"
                            . "Это будет стоить 100 <img width='13' height='13' src='/template/images/сoin.png'/><br />"
                            . "Если же Вы уже добавляли объявление в VIP-зону, то оно будет поднято.";
                            
                    $message_array = array (
                        "Добавление объявления в VIP-зону",
                        "$message",
                        "yellow",
                        "vip_state/".$type_ads."/".$ads_id."/1",
                        "Да, точно",
                        "my_cabinet/".$type_ads."/1",
                        "Нет",
                    );
                }
                else
                {
                    // Берем данные о балансе
                    $query_1 = $db->prepare("SELECT balance FROM users WHERE id=:id");
                    $params_1 = [
                    'id' => $_SESSION['id'],
                    ];
                    $query_1 -> execute($params_1);
                    $query_1->setFetchMode(PDO::FETCH_ASSOC);
                    $result_1 = $query_1 -> fetch();

                    if( ($result_1['balance'] - 100) > -1)
                    {

                        // Обновление баланса
                        $query_4 = $db->prepare("UPDATE users SET balance = balance - 100 WHERE id = :id;");
                        $params_4 = [
                            'id' => $_SESSION['id']
                        ];
                        $query_4 -> execute($params_4);



                        // Обновление времени объявления
                        $query_2 = $db->prepare("UPDATE $type_ads SET vip_time = :now WHERE id = :ads_id and author = :now_id;");
                        $params_2 = [
                            'now' => time(),
                            'now_id' => $_SESSION['id'],
                            'ads_id' => $ads_id
                                ];
                        $query_2 -> execute($params_2);



                        $message = "Объявление успешно добавлено в VIP-зону";
                        $message_array = array (
                        "Добавление объявления в VIP-зону",
                        "$message",
                        "yellow",
                        "my_cabinet/".$type_ads."/1",
                        "Отлично",
                        );
                    }
                    else
                    {
                        $message = "Недостаточно монет на балансе<br>"
                                . "Их можно получать раз в 20 часов. Купить - нельзя.";
                        $message_array = array (
                        "Добавление объявления в VIP-зону",
                        "$message",
                        "red",
                        "my_cabinet/".$type_ads."/1",
                        "Вернуться назад",
                        );  
                    }
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


