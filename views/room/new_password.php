<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Изменение пароля | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>

    <div class="container-fluid">
        <?php
        $header_text = "Изменение пароля";
        if(!isset($_SESSION['id']))
        {
            header('Location: /authentication_warning');
            exit; 
        } 
        
        
        
        if($_POST['password_old_post'] != null && $_POST['password_new_post'] != null && $_POST['password_new_post_2'] != null)
        {
            require_once(ROOT.'/models/Corrected_post.php');
            $old_password_post = get_corrected_post($_POST['password_old_post']);
            $new_password_post = get_corrected_post($_POST['password_new_post']);
            $new_2_password_post = get_corrected_post($_POST['password_new_post_2']);

            $db = Db::getConnection();

            // Запрос старого пароля
            $query = $db->prepare("SELECT pass FROM users WHERE id=:id");
            $params = [
                'id' => $_SESSION['id']
            ];
            $query -> execute($params);
            $result = $query -> fetch();

            if($result['pass'] != null)
            {
                if( $result['pass'] == md5($old_password_post) )
                {

                    if($new_password_post == $new_2_password_post)
                    {
                        $message = "Вы изменили пароль на: $new_password_post";
                        
                        // Обновление данных пользователя  
                        $query_1 = $db->prepare("UPDATE users SET pass = :pass WHERE id = :id;");
                        $params_1 = [
                            'id' => $_SESSION['id'],
                            'pass' => md5($new_2_password_post)
                        ];
                        $query_1 -> execute($params_1);
                        $error = false;
                        
                    }
                    else
                    {
                        $message = "Новые пароли на совпадают, введите их еще раз";
                        $error = true;
                    }




                }
                else
                {
                    $message = "Не правильно введен старый пароль";
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
        $message = "Введите все обязательные данные под звездочкой (*)";
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


