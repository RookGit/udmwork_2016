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
    <script src="/template/js/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  </head>

  <body>
<?php 
require_once(ROOT . '/components/Header.php');


switch ($table_type) {
    case "jobs":
        $ads = "вакансии";
        $header_exp = "Требуемый опыт работы в данной сфере:";
        $header_gender = "Требуемый пол:"; 
        $header_graph = "Требуемый"; 
        break;
    
    case "resume":
        $ads = "резюме";
        $header_exp = "Опыт работы в данной сфере:";
        $header_gender = "Пол:"; 
        $header_graph = "Желаемый"; 
        break;
    
    case "services":
        $ads = "услуги";
        break;
    
    default:
        ?>
        <script language="JavaScript">
            window.location.href = "/404"
        </script>
        <?php
        exit; 
}

?>
<div class="container-fluid">
    <div class='starter-template window_message window_message_green'>
        <h1 class='header_message header_message_green'>
            Редактирование <?php echo $ads; ?>
        </h1><p class='lead message'>
        

        <?php
        
        if(!isset($_SESSION['id']))
        {
            ?>
            <script language="JavaScript">
                window.location.href = "/authentication_warning"
            </script>
            <?php

            exit; 
        }   
        
        if(!(int) $id_ads > 0)
        {
            ?>
            <script language="JavaScript">
                window.location.href = "/404"
            </script>
            <?php
            exit;    
        }
        
        $db = Db::getConnection();
        $query = $db->prepare("SELECT * FROM $table_type WHERE author = :id_author and moder != 6 and id = :id_ads");
        $params = [
            'id_author' => $_SESSION['id'],
            'id_ads' => (int) $id_ads
                ];
        $query -> execute($params);
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query -> fetch(); 
        
        $edited_value = Ads_check($result, $table_type);
        
        if($result == null)
        {
            ?>
            <script language="JavaScript">
                window.location.href = "/404"
            </script>
            <?php
            exit;    
        }
        else 
        {
        $table_type_plus = $table_type."_about";
        
        $query_2 = $db->prepare("SELECT * FROM $table_type_plus WHERE id = :id_ads");
        $params_2 = [
            'id_ads' => $result['id']
        ];
        $query_2 -> execute($params_2);
        $query_2->setFetchMode(PDO::FETCH_ASSOC);
        $result_2 = $query_2 -> fetch();
        }
            
        $a = ceil(rand(2,20));
        $b = ceil(rand(2,20));
        $result_captcha = $a + $b;
        
        echo '<script language="javascript">var zp = '.$result['payment'].';</script>';

        
        echo '<form class="form_login form_plus_ads" role="form" method="POST" action="/editing_test/'.$table_type.'/'.(int) $id_ads.'">
            <div class="form-group">
                <label for="exampleInputEmail">*Заголовок '.$ads.':</label>
                <textarea onkeyup="schet(this, 50)" rows="2" maxlength="50" name="header_post" type="text" class="form-control form-input" id="exampleInputEmail" placeholder="Введите заголовок. Он будет отображаться при поиске. Заинтересуйте людей.">'.$result['header'].'</textarea>
                <label id="header_post_rest" class="rest_symbols">Кратко. Понятно. Максимум 50 символов.</label>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">*Описание '.$ads.':</label>
                <textarea onkeyup="schet(this, 1500)" rows="10" maxlength="1500" name="about_post" type="text" class="form-control form-input" id="exampleInputEmail" placeholder="Опишите объявление как можно подробнее.">'.$result_2['about'].'</textarea>
                <label id="about_post_rest" class="rest_symbols">Опишите вакансию. Максимум 1500 символов.</label>
            </div>';

            echo '<div class="form-group">
                <label>
                    Заработная плата 
                    ( <input class="checkbox_style pact_chekbox" type="checkbox" onclick="check()" id="pact_check" name="pact_check_post"/>
                    <label for="pact_check">Договорная</label> ):                
                </label>
                <input id="payment" name="payment_post" type="number" class="form-control form-input" placeholder="Введите заработную плату">
            </div>';
            
            echo '<div class="form-group">
                <label>Сфера деятельности:</label>
                <div class="about_ads_text">'.$edited_value['type'].'</div>
            </div>';

            echo '<div class="form-group">
                <label>Объявление в:</label>
                <div class="about_ads_text">'.$edited_value['city'].'</div>
            </div>';

            if($table_type == "jobs" or $table_type == "resume")
            {
                
                echo '<div class="form-group">
                    <label>'.$header_exp.'</label>
                    <div class="about_ads_text">'.$edited_value['exp'].'</div>
                </div>';

                echo '<div class="form-group">
                    <label>'.$header_graph.' график работы:</label>
                    <div class="about_ads_text">'.$edited_value['graph'].'</div>
                </div>';

                echo '<div class="form-group">
                    <label>'.$header_gender.'</label>
                    <div class="about_ads_text">'.$edited_value['gender'].'</div>
                </div>';
            }
            
            if($result_2['telephone'] != null)
            echo '<div class="form-group">
                <label>Телефон для связи:</label>
                <div class="about_ads_text">'.$result_2['telephone'].'</div>
            </div>';
            
            if($result_2['email'] != null)
            echo '<div class="form-group">
                <label>Email для связи:</label>
                <div class="about_ads_text">'.$result_2['email'].'</div>
            </div>';
            
            if(isset($result_2['site']) and $result_2['site'] != null)
            echo '<div class="form-group">
                <label>Страница / Группа Вконтакте:</label>
                <div class="about_ads_text">'.$result_2['site'].'</div>
            </div>';
            
            echo '<div class="form-group">
                <label>*Введите правильный ответ: '.$a.' + '.$b.' =</label>
                <input min="0" max="120" name="my_result" type="number" class="form-control form-input" placeholder="Введите ответ">
            </div>
            <input type="hidden" name="true_result" value="'.$result_captcha.'">

            <div class="checkbox">
                <input id="assent_id" name="assent" class="checkbox_style" type="checkbox" value="">
                <label for="assent_id">Признаю, что несу полную ответственность 
                за предоставленные мною данные, а так же
                принимаю условия <a href="/agreement" class="agree_link">пользовательского соглашения</a></label>
            </div>


            <button type="submit" class="btn btn-default button_message button_green">Редактировать объявление</button>
        </form>';
        ?>


    </div>
</div>
    <?php require_once(ROOT.'/components/Footer.php'); ?>
    <script>
        
        var item = document.getElementsByName("payment_post")[0];
        var item2 = document.getElementsByName("pact_check_post")[0];

        if(zp == 1)
        {
            item.disabled = true;
            item.value = "";
            item.placeholder = "Договорная";
            item2.checked = true;
        }
        else
        {
            item.disabled = false;
            item.value = zp;
            item.placeholder = "";
        }

    $(function(){
      $("#phone").mask("+7(999) 999-99-99");
    });   
    var item = document.getElementsByName("payment_post")[0];
    function check()
    {
        if(pact_check.checked)
        {
            item.value = "";
            item.disabled = true;
            item.placeholder = "Договорная";
        }
        else 
        { 
            item.disabled = false;
            item.placeholder = "";
        }
    }

    function schet(element, rest) 
    {   

        var name_element = element.getAttribute("name");
        if(name_element != "about_post")
        element.value=element.value.replace(/\r?\n/g ," ");
        var text = document.getElementsByName(name_element)[0];
        var content = text.value;
        var length_text = content.length;
        var rest_label = document.getElementById(name_element + "_rest");
        rest_label.innerHTML = 'Осталось символов: ' + (rest - length_text);
    }
    </script>
  </body>
</html>