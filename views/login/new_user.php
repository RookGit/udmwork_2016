<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Регистрация пользователя | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
            $order = array("\r\n", "\n", "\r");
            
            $email_post = htmlspecialchars($_POST['email_post']); // *
            $email_post = mb_strimwidth($email_post, 0, 50, "");
            $email_post = str_replace($order, "", $email_post);
            
            $password_post = htmlspecialchars($_POST['password_post']); // *
            $password_post = mb_strimwidth($password_post, 0, 10, "");
            $password_post = str_replace($order, "", $password_post);
            
//            $surname_post = htmlspecialchars($_POST['surname_post']);
//            
//            $name_post = htmlspecialchars($_POST['name_post']);
//            
//            $age_post = htmlspecialchars($_POST['age_post']);
//            
//            $number_post = htmlspecialchars($_POST['number_post']);
//            
//            $patronymic_post = htmlspecialchars($_POST['patronymic_post']);
//            
//            $city_post = $_POST['city_post'];
//            
//            $gender_post = $_POST['gender_post'];
            
            $true_result_post = $_POST['true_result'];
            
            $my_result_post = $_POST['my_result']; // *
            
            $error = false;
            
            if(isset($_POST['assent'])) {
                if($my_result_post == $true_result_post) {
                    if($email_post != null and $password_post != null) {
                        $db = Db::getConnection();
                        $query = $db->prepare("SELECT email FROM users WHERE email=:email ");
                        $params = ['email' => $email_post];
                        $query -> execute($params);
                        $result = $query -> fetch();

                        if(isset($result['email'])){
                            $message = "Для регистрации выберите другой email";       
                            $error = true;    
                        }
                        else
                        {
                            $query = $db->prepare("SELECT value FROM black_list WHERE value=:email");
                            $params = ['email' => $email_post];
                            $query -> execute($params);
                            $result = $query -> fetch();
                            if(isset($result['value'])){
                                $message = "Данный номер или email находятся в черном списке";       
                                $error = true;    
                            }
                            else
                            {
                                $message = "Регистрация прошла успешно <br />"
                                        . "Ваш email: $email_post <br />"
                                        . "Ваш пароль: $password_post <br />";
                                
                                $query_2 = $db->prepare("INSERT INTO `users` "
                                        . "(`id`, `email`, `pass`, `timebonus`, `GenVerAge`, `moder`, `balance`, `rest`, `vk`, `my_resume`, `my_jobs`, `my_services`) VALUES "
                                        . "(NULL, :email, :password, ".time().", 30, 1, 25, 3, 0,0,0,0);");
                                
                                $params_2 = ['email' => $email_post, 'password' => md5($password_post)];
                                $query_2 -> execute($params_2);
								
								
								
								
								
								// Отправка email
								$query_3 = $db->prepare("SELECT id, email FROM users WHERE email=:email and pass = :password");
								$params_3 = [
									'email' => $email_post,
									'password' => md5($password_post)
								];
								$query_3 -> execute($params_3);
								$result_3 = $query_3 -> fetch();
								
								$user_id = $result_3['id'];
								$user_email = $result_3['email'];
								
								
								$real_code = md5($user_id."udmwork".$user_email."verification".$user_id."code");
								$MessHeader = "Подтверждение email на сайте UDMWORK.RU";
								$ver_link = "https://udmwork.ru/code_verification/$real_code/$user_id/$user_email/";
								$message_send = "Для подтверждения email на сайте UDMWORK.RU просто перейдите по данной ссылке: <a href='$ver_link'>$ver_link</a>";
								require_once(ROOT.'/components/smtp/Send_Mail.php');
								$message .= Send_Mail("$email_post","$MessHeader","$message_send"); 
                            
								$query_4 = $db->prepare("INSERT INTO `email` "
								. "(`id`, `email`, `time`) VALUES "
								. "(NULL, :email, ".time().");");

								$params_4 = ['email' => $email_post];
								$query_4 -> execute($params_4);
							}
                        }
                    }
                    else
                    {
                    $message = "Заполните все обязательные поля со звездочкой (*)";       
                    $error = true;
                    }
                }
                else
                {
                $message = "Не правильно введен ответ на пример";
                $error = true;
                }
            }
            else
            {
                $message = "Нельзя зарегистрироваться, не согласившись с правилами сайта";
                $error = true;
            }
            
            if($error) {
                $value_link = "reg";
                $value_button = "Вернуться назад";  
                $style_window = "red";
            } 
            else
            {
                $value_link = "login";
                $value_button = "Продолжить"; 
                $style_window = "green";
            }

            $message_array = array (
                "Процесс регистрации",
                "$message",
                "$style_window",
                "$value_link",
                "$value_button",
            );
            
            plus_window_message($message_array);
        ?>
      

    </div>

    <?php require_once(ROOT.'/components/Footer.php'); ?>
  </body>
</html>