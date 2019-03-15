<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Отправка верификации email | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
		
			if(!isset($_SESSION['id']))
			{
				header('Location: /authentication_warning');
				exit; 
			}  
			
			// $real_code = md5($user_id."udmwork".$user_email."verification".$user_id."code");
			
			$db = Db::getConnection();
			$query = $db->prepare("SELECT id, GenVerAge, email FROM users WHERE id=:id ");
			$params = ['id' => $_SESSION['id']];
			$query -> execute($params);
			$query->setFetchMode(PDO::FETCH_ASSOC);
			$result = $query -> fetch();
			
			if($result['GenVerAge'][1] == "0")
			{
				$query_2 = $db->prepare("SELECT time FROM email WHERE email=:email AND time=(SELECT MAX(time) FROM email)");
				$params_2 = ['email' => $result['email']];
				$query_2 -> execute($params_2);
				$query_2->setFetchMode(PDO::FETCH_ASSOC);
				$result_2 = $query_2 -> fetch();
				

				if(time() - $result_2['time'] > 599)
				{
					// Отправка email

					
					$user_id = $result['id'];
					$user_email = $result['email'];
					
					
					$real_code = md5($user_id."udmwork".$user_email."verification".$user_id."code");
					$MessHeader = "Подтверждение email на сайте UDMWORK.RU";
					$ver_link = "https://udmwork.ru/code_verification/$real_code/$user_id/$user_email/";
					$message_send = "Для подтверждения email на сайте UDMWORK.RU просто перейдите по данной ссылке: <a href='$ver_link'>$ver_link</a>";
					require_once(ROOT.'/components/smtp/Send_Mail.php');
					$message = Send_Mail("$user_email","$MessHeader","$message_send"); 
				
					$query_4 = $db->prepare("INSERT INTO `email` "
					. "(`id`, `email`, `time`) VALUES "
					. "(NULL, :email, ".time().");");

					$params_4 = ['email' => $user_email];
					$query_4 -> execute($params_4);
					
					
					$error = false;
				}
				else
				{
					$message = "На Ваш email уже было отправлено письмо менее 10 минут назад. Попробуйте позже.";
					$error = true;	
				}
			}
			else
			{
				$message = "Вы уже подтвердили свой email";
				$error = true;
			}
			
			if($error == true) $style_color = "red";
			else $style_color = "yellow";
		
            $message_array = array (
                "Верификация email",
                "$message",
                "$style_color",
                "my_cabinet/resume/1",
                "Вернуться в личный	кабинет",
            );
            
            plus_window_message($message_array);
        ?>
      

    </div>

    <?php require_once(ROOT.'/components/Footer.php'); ?>
  </body>
</html>