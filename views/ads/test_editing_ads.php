<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Редактирование объявления | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
            require_once(ROOT.'/models/Corrected_post.php');
            $header_window = "Редактирование объявления № $ads_id";
            $message = "Какое-то сообщение";
            
            $header_post = get_corrected_post($_POST['header_post'], 50, true);

            $about_post = get_corrected_post($_POST['about_post'], 2500, false);
            
            if(isset($_POST['payment_post']) and $_POST['payment_post'] == null)
                $payment_post = 0;    
            else
                if(isset($_POST['pact_check_post'])) $payment_post = 1;
                else
                    $payment_post = get_corrected_post($_POST['payment_post']);
            
                
            if(isset($_POST['assent'])) 
            {
                if($_POST['my_result'] == $_POST['true_result']) 
                {
                    if($_POST['header_post'] != null and $_POST['about_post']) 
                    {
                        $db = Db::getConnection();
                        
                        // Выбор id из базы данных объявлений
                        $query = $db->prepare("SELECT id FROM $type_ads WHERE author=:id ");
                        $params = ['id' => $_SESSION['id']];
                        $query -> execute($params);
                        $result = $query -> fetch();

                        if($result['id'] != null)
                        {
                            // Обновление данных в основной таблице
                            $query_2 = $db->prepare("UPDATE $type_ads SET header = :header WHERE id = :ads_id and author = :now_id;");
                            $params_2 = [
                                'ads_id' => $ads_id,
                                'now_id' => $_SESSION['id'],
                                'header' => $header_post
                            ];
                            $query_2 -> execute($params_2);
                            
                            $type_ads_plus = $type_ads."_about";
                            // Обновление данных в дополнительной таблице
                            $query_3 = $db->prepare("UPDATE $type_ads_plus SET about = :about WHERE id = :ads_id;");
                            $params_3 = [
                                'ads_id' => $ads_id,
                                'about' => $about_post
                            ];
                            $query_3 -> execute($params_3);        
                            $message = "Объявление успешно обновлено";  
                            $error = false;  
                        }
                        else
                        {
                            $message = "Введенные данные не корректны";  
                            $error = true;   
                        }
                        
                    }
                    else
                    {
                        $message = "Заполните все обязательные данные со звездочкой (*)";  
                        $error = true; 
                    }

                }
                else
                {
                    $message = "Не верно введен ответ на пример";  
                    $error = true;
                }

            }  
            else 
            {
                $message = "Нельзя добавить объявление, не согласившись с правилами";  
                $error = true;
            }
            
            if($error == true)
            {
                $style_color = "red";
                $link_button = "editing_ads/$type_ads/$ads_id";
                $text_button = "Назад";
            }
            else 
            {
                $style_color = "yellow";
                $link_button = "my_cabinet/$type_ads/1";
                $text_button = "Отлично";
            }
 
            $message_array = array (
                "$header_window",
                "$message",
                "$style_color",
                "$link_button",
                "$text_button",
            );
            
            plus_window_message($message_array);
        ?>
      

    </div>

    <?php require_once(ROOT.'/components/Footer.php'); ?>
  </body>
</html>