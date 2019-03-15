<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Верификация mail | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
			
			
			$real_code = md5($user_id."udmwork".$user_email."verification".$user_id."code");
			
			if($real_code == $code)
			{
				$db = Db::getConnection();
				
				// Берем данные пользователя
				$query = $db->prepare("SELECT GenVerAge FROM users WHERE id=:id and email = :email and moder = 1 ");
				$params = [
					'id' => $user_id,
					'email' => $user_email
				];
				$query -> execute($params);
				$query->setFetchMode(PDO::FETCH_ASSOC);
				$result = $query -> fetch(); 

				if($result['GenVerAge']	!= null)
				{					
					if($result['GenVerAge'][1] == "1")
					{
					$message = "Вы уже активировали свой email";
					$error = true;	
					}
					else
					{
					$query_2 = $db->prepare("UPDATE `users` SET `GenVerAge` = :GenVerAge WHERE id=:id and email = :email");
					$params_2 = [
						'id' => $user_id,
						'email' => $user_email,
						'GenVerAge' => $result['GenVerAge'][0]."1"
					];
					$query_2 -> execute($params_2);
					$message = "Активация email успешно произошла";
					$error = false;
					}
				}
				else
				{
					$message = "Произошла ошибка подключения";
					$error = true;
				}
			}
			else
			{
				$message = "Ошибка";
				$error = true;	
			}
			
			if($error == true) $style_color = "red";
			else $style_color = "yellow";
		
            $message_array = array (
                "Верификация страницы",
                "$message",
                "$style_color",
                "hello",
                "Вернуться на сайт",
            );
            
            plus_window_message($message_array);
        ?>
      

    </div>

    <?php require_once(ROOT.'/components/Footer.php'); ?>
  </body>
</html>