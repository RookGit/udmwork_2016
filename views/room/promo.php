<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Проверка промокода | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
        $header_text = "Проверка промокода";
        if(!isset($_SESSION['id']))
        {
            header('Location: /authentication_warning');
            exit; 
        } 
        
        if($_POST['promo_post'] != null)
        {
            $db = Db::getConnection();
            
            // Запрос кода
            $query = $db->prepare("SELECT * FROM promo WHERE code=:code");
            $params = [
                'code' => $_POST['promo_post']
            ];
            $query -> execute($params);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $result = $query -> fetch();
            
            if($result['code'] != null)
            {
                if( ($result['rest']-1) > -1)
                {
                    // Запрос данных о пользователе
                    $query_2 = $db->prepare("SELECT my_resume, my_jobs, my_services FROM users WHERE id=:id");
                    $params_2 = [
                        'id' => $_SESSION['id']
                    ];
                    $query_2 -> execute($params_2);
                    $query_2->setFetchMode(PDO::FETCH_ASSOC);
                    $result_2 = $query_2 -> fetch();
                    
                    if(($result_2['my_resume'] + $result_2['my_jobs'] + $result_2['my_services']) >= $result['demand'])
                    {
                        // Проверка на ввод
                        $query_3 = $db->prepare("SELECT * FROM promo_enter WHERE id_promo=:id_promo AND id_user = :id");
                        $params_3 = [
                            'id_promo' => $result['id'],
                            'id' => $_SESSION['id']
                        ];
                        $query_3 -> execute($params_3);
                        $query_3->setFetchMode(PDO::FETCH_ASSOC);
                        $result_3 = $query_3 -> fetch();
                        
                        if($result_3['id_promo'] == null)
                        {
                            // Обновление остатка ввода промокода    
                            $query_4 = $db->prepare("UPDATE promo SET rest = rest - 1 WHERE id = :id;");
                            $params_4 = [
                                'id' => $result['id'],
                            ];
                            $query_4 -> execute($params_4);

                            // Добавление ввода кода    
                            $query_5 = $db->prepare("INSERT INTO `promo_enter` "
                                    . "(`id`, `id_promo`, `id_user`) VALUES "
                                    . "(NULL, :id_promo, :id_user);");
                            $params_5 = [
                                'id_promo' => $result['id'],
                                'id_user' => $_SESSION['id']
                            ];
                            $query_5 -> execute($params_5);

                            // Обновление баланса пользователя    
                            $query_6 = $db->prepare("UPDATE users SET balance = balance + :plus WHERE id = :id;");
                            $params_6 = [
                                'plus' => $result['plus'],
                                'id' => $_SESSION['id']
                            ];
                            $query_6 -> execute($params_6); 
                        
                            $message = "Вы успешно получили бонус";
                            $error = false;
                        }
                        else
                        {
                            $message = "Вы уже вводили данный промокод";
                            $error = true;
                        }
                    }
                    else
                    {
                        $message = "Чтобы активировать данный промокод нужно иметь не менее ".$result['demand']." объявлений(е)";
                        $error = true;
                    }
                }
                else
                {
                    $message = "Данный промокод уже активировали допустимое количество раз";
                    $error = true;
                }
            }
            else
            {
                $message = "Введен неверный промокод";
                $error = true;
            }

        }
        else
        {
            $message = "Вы не ввели промокод. Введите его.";
            $error = true;
        }
        
            if($error == true) {
                $color_style = "red";
                $button_text = "Назад";
            } 
            else
            {
                $color_style = "yellow";
                $button_text = "Отлично";
            }

            $message_array = array (
                "$header_text",
                "$message",
                "$color_style",
                "my_cabinet/resume/1",
                "$button_text",
            );
            
            plus_window_message($message_array);
        ?>
      

    </div>

    <?php require_once(ROOT.'/components/Footer.php'); ?>
  </body>
</html>


