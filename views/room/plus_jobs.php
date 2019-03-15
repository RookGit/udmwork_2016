<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Добавление вакансии | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
    <script src="/template/js/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  </head>

  <body>
<?php 
require_once(ROOT . '/components/Header.php');
$page_type = "plus_jobs";
?>
<div class="container-fluid">
    <div class='starter-template window_message window_message_green'>
        <h1 class='header_message header_message_green'>Добавить: 
        <a class='form_no_active_white' href='/plus_ads/resume'>Резюме</a> | 
        <a class='form_active_white' href='/plus_ads/jobs'><ins>Вакансию</ins></a> | 
        <a class='form_no_active_white' href='/plus_ads/services'>Услугу</a></h1><p class='lead message'>
        
        <h3>Добавление вакансии:</h3><hr />

        <?php
        $a = ceil(rand(2,20));
        $b = ceil(rand(2,20));
        $result = $a + $b;

        echo '<form class="form_login form_plus_ads" role="form" method="POST" action="/plus_jobs/jobs">
            <div class="form-group">
                <label for="exampleInputEmail">*Заголовок вакансии:</label>
                <textarea onkeyup="schet(this, 50)" rows="2" maxlength="50" name="header_post" type="text" class="form-control form-input" id="exampleInputEmail" placeholder="Введите заголовок. Он будет отображаться при поиске. Заинтересуйте работодателей."></textarea>
                <label id="header_post_rest" class="rest_symbols">Кратко. Понятно. Максимум 50 символов.</label>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail">*Описание вакансии:</label>
                <textarea onkeyup="schet(this, 1500)" rows="10" maxlength="1500" name="about_post" type="text" class="form-control form-input" id="exampleInputEmail" placeholder="Опишите вакансию. Расскажите о Ваших требованиях к работнику, условиях работы."></textarea>
                <label id="about_post_rest" class="rest_symbols">Опишите вакансию. Максимум 1500 символов.</label>
            </div>

            <div class="form-group">
                <label>Требуемый опыт работы в данной сфере:</label><br />';
                require_once(ROOT."/components/select/exp.php"); 
            echo '</div>

            <div class="form-group">
                <label>Сфера деятельности:</label><br />';
                require_once(ROOT."/components/select/type.php");
            echo '</div>

            <div class="form-group">
                <label>Актуальный город:</label><br />';
                require_once(ROOT."/components/select/city.php");
            echo '</div>

            <div class="form-group">
                <label>Требуемый график работы:</label><br />';
                require_once(ROOT."/components/select/graph.php");
            echo '</div>

            <div class="form-group">
                <label>Требуемый пол:</label><br />';
                require_once(ROOT."/components/select/gender.php");
            echo '</div>

            <div class="form-group">
                <label>
                    Заработная плата 
                    ( <input class="checkbox_style pact_chekbox" type="checkbox" onclick="check()" id="pact_check" name="pact_check_post"/>
                    <label for="pact_check">Договорная</label> ):                
                </label>
                <input id="payment" name="payment_post" type="number" class="form-control form-input" placeholder="Введите заработную плату">
            </div>
            
            <div class="form-group">
                <label>*Телефон для связи:</label>
                <input name="number_post" id="phone" type="tel" pattern="+7 ([0-9]{3}) [0-9]{3}-[0-9]{2}-[0-9]{2}" class="form-control form-input" placeholder="Введите телефон">
            </div>
            
            <div class="form-group">
                <label>Email для связи:</label>
                <input name="email_post" type="email" class="form-control form-input" placeholder="Введите email">
            </div>
            
            <div class="form-group">
                <label>*Введите правильный ответ: '.$a.' + '.$b.' =</label>
                <input min="0" max="120" name="my_result" type="number" class="form-control form-input" placeholder="Введите ответ">
            </div>
            <input type="hidden" name="true_result" value="'.$result.'">

            <div class="checkbox">
                <input id="assent_id" name="assent" class="checkbox_style" type="checkbox" value="">
                <label for="assent_id">Признаю, что несу полную ответственность 
                за предоставленные мною данные, а так же
                принимаю условия <a href="/agreement" class="agree_link">пользовательского соглашения</a></label>
            </div>


            <button type="submit" class="btn button_message button_green">Добавить вакансию</button>
        </form>';
        ?>


    </div>
</div>
    <?php require_once(ROOT.'/components/Footer.php'); ?>
    <script>
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