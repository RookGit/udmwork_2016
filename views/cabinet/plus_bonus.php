<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Получение бонуса | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
        $header_text = "Получение бонуса";
        if(!isset($_SESSION['id']))
        {
            header('Location: /authentication_warning');
            exit; 
        } 
            $db = Db::getConnection();
            
            // Запрос времени, подтверждения email и модерации страницы
            $query = $db->prepare("SELECT moder, timebonus, GenVerAge, rest FROM users WHERE id=:id");
            $params = [
                'id' => $_SESSION['id']
            ];
            $query -> execute($params);
            $query->setFetchMode(PDO::FETCH_ASSOC);
            $result = $query -> fetch();
            
            if($result['moder'] == 1 || $result['moder'] == 8)
            {
                if($result['timebonus'] != null)
                {
                    if( (time() - $result['timebonus']) > 72000)
                    {

                        if($result['GenVerAge'][1] == "1")
                        {
                            $money_bonus = 25;
                            $rest_bonus = 3;
                            $message = "Вы успешно получили бонус $money_bonus монет и возможность разместить $rest_bonus объявления";
                        }
                        else
                        {
                            $money_bonus = 10;
                            $rest_bonus = 1;  
                            $message = "Вы успешно получили бонус $money_bonus монет и возможность разместить $rest_bonus объявления. "
                                    . "Чтобы получать бонус 25 монет и 3 объявления - подтвердите свой email.";
                        }

                        if($result['rest'] > $rest_bonus)
                        {
                            $message = "Вы успешно получили бонус $money_bonus монет. ";
                            $rest_bonus = $result['rest'];
                        }


                        // Обновление данных пользователя  
                        $query_1 = $db->prepare("UPDATE users SET balance = balance + :money, rest = :rest, timebonus = :now WHERE id = :id;");
                        $params_1 = [
                            'id' => $_SESSION['id'],
                            'money' => $money_bonus,
                            'rest' => $rest_bonus,
                            'now' => time()
                        ];
                        $query_1 -> execute($params_1);
                        $error = false;

                    }
                    else
                    {
                        $message = "Бонус можно получать 1 раз в 20 часов. Бонус включает 25 монет и возможность разместить 3 объявления";
                        $error = true;
                    }
                }
                else
                {
                    $message = "Невозможно определить пользователя";
                    $error = true;
                }
            }
            else
            {
                $message = "Вы не можете получать бонус, т.к администрация сайта внесла Вас в список подозрительных работодателей<br>Если это не справедливо, то свяжитесь с ней по адресу: <br>https://vk.com/id440434126";
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


