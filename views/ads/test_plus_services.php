<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Добавление услуги | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
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

require_once(ROOT.'/models/Corrected_post.php');


$header_post = get_corrected_post($_POST['header_post'], 50, true);

$about_post = get_corrected_post($_POST['about_post'], 2500, false);

$type_post = get_corrected_post($_POST['type_post']);
if($type_post == "all_type") $type_post = "other";

$city_post = get_corrected_post($_POST['city_post']);

if(isset($_POST['payment_post']) and $_POST['payment_post'] == null)
    $payment_post = 0;    
else if(isset($_POST['pact_check_post'])) $payment_post = 1;
else
    $payment_post = get_corrected_post($_POST['payment_post']);

$number_post = get_corrected_post($_POST['number_post']);

$email_post = get_corrected_post($_POST['email_post']);

$site_post = get_corrected_post($_POST['site_post']);

if(isset($_POST['assent'])) {
    if($_POST['my_result'] == $_POST['true_result']) {
        if($_POST['header_post'] != null and $_POST['about_post'] != null and $_POST['number_post'] != null) {
            $db = Db::getConnection();
            
            $query = $db->prepare("SELECT rest FROM users WHERE id=:id ");
            $params = ['id' => $_SESSION['id']];
            $query -> execute($params);
            $result = $query -> fetch();
            
            if(($result['rest'] - 1) > -1)
                {
                    // Ищем введенные данные в черном списке
                    $query_black = $db->prepare("SELECT value FROM black_list WHERE value=:email OR value=:number");
                    $params_black = [
                        'email' => $email_post,
                        'number' => $number_post,
                            ];
                    $query_black -> execute($params_black);
                    $result_black = $query_black -> fetch();
                    
                    if(isset($result_black['value']))
                    {
                        $message = "Данный номер или email находятся в черном списке";       
                        $error = true;    
                    }
                    else
                    {
                        // Обновляем данные пользователя
                        $query = $db->prepare("UPDATE users SET rest = rest - 1, my_services = my_services + 1 WHERE id = :id;");
                        $query -> execute($params);
                        
                        $time_plus = time();
                        $error = false;  
                        
                        
                        // Добавляем в основную таблицу
                        $query_2 = $db->prepare("INSERT INTO `udmwork`.`services` "
                                . "(`id`, `city`, `author`, `header`, `moder`, `payment`, `time`, `vip_time`, `see`, `type`, `color`) VALUES "
                                . "(NULL, :city, :id, :header, (SELECT moder FROM users WHERE id=:id), :payment, :time, 0, 0, :type, :color);");
                        $params_2 = [
                            'id' => $_SESSION['id'],
                            'city' => $city_post,
                            'header' => $header_post,
                            'payment' => $payment_post,
                            'time' => $time_plus,
                            'type' => $type_post,
                            'color' => "",
                                ];
                        $query_2 -> execute($params_2);


                        // Берем id из основной таблицы
                        $query_3 = $db->prepare("SELECT id FROM services WHERE author=:id and header = :header and time = :time");
                        $params_3 = [
                            'id' => $_SESSION['id'],
                            'header' => $header_post,
                            'time' => $time_plus,
                        ];
                        $query_3 -> execute($params_3);
                        $result_3 = $query_3 -> fetch();

                        $this_ads_id = $result_3['id'];


                        // Добавление во вспомогательную таблицу
                        $query_4 = $db->prepare("INSERT INTO `udmwork`.`services_about` "
                                . "(`id`, `about`, `telephone`, `email`, `site`) VALUES "
                                . "(:id, :about, :number, :email, :site);");
                        $params_4 = [
                            'id' => $this_ads_id,
                            'about' => $about_post,
                            'number' => $number_post,
                            'email' => $email_post,
                            'site' => $site_post,
                                ];
                        $query_4 -> execute($params_4);
                    }
            }
            else
            {
            $message = "Сегодня Вы больше не можете размещать объявления. Чтобы "
                    . "разместить - получите ежедневный бонус в личном кабинете.";  
            $error = true;   
            }
        }
        else
        {
        $message = "Заполните все обязательные данные под звездочкой (*)";  
        $error = true;             
        }
    }
    else {
    $message = "Не верно введен ответ на пример";  
    $error = true;    
    }
}
else
{
$message = "Нельзя добавить объявление, не согласившись с правилами";  
$error = true;
}

if($error == true){
    $value_link = "plus_ads/services";
    $style_window = "red";
    $value_button = "Назад";
}
else {
    $message = "Объявление успешно размещено.";  
    $value_link = "my_cabinet/services/1";
    $style_window = "yellow";
    $value_button = "Отлично";
}

$message_array = array (
    "Добавление резюме",
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