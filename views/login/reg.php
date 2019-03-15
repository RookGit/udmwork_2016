<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Регистрация пользователя | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU">
    <meta name="author" content="">
    <title>Регистрация пользователя | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
    <script src="/template/js/jquery.maskedinput.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  </head>

  <body>
    <?php require_once(ROOT . '/components/Header.php'); ?>
    
    <div class="container-fluid">
        <?php
            $a = ceil(rand(2,20));
            $b = ceil(rand(2,20));
            $result = $a + $b;

            $color_style = "white";
            $message_array = array (
                "<a class='form_no_active' href='/login'>Вход</a> | <a class='form_active' href='/reg'>Регистрация</a> | <a class='form_no_active' href='/recovery'>Восстановление</a>",
                
                '<form class="form_login" role="form" method="POST" action="/new_user">
                    
                    <div class="form-group">
                        <label for="exampleInputEmail">*Email для авторизации:</label>
                        <input maxlength="60" name="email_post" type="email" class="form-control form-input" id="exampleInputEmail" placeholder="Введите email">
                    </div>
                    
                    <div class="form-group">
                        <label>*Пароль:</label>
                        <input maxlength="10" name="password_post" type="password" class="form-control form-input" id="exampleInputPassword1" placeholder="Введите пароль">
                    </div>
                    

                    <!--


                    <div class="form-group">
                        <label>Фамилия:</label>
                        <input maxlength="30" name="surname_post" type="text" class="form-control form-input" id="exampleInputPassword" placeholder="Введите фамилию">
                    </div>
                    
                    <div class="form-group">
                        <label>Имя:</label>
                        <input maxlength="20" name="name_post" type="text" class="form-control form-input" id="exampleInputPassword1" placeholder="Введите имя">
                    </div>
                    
                    <div class="form-group">
                        <label>Отчество:</label>
                        <input maxlength="30" name="patronymic_post" type="text" class="form-control form-input" placeholder="Введите отчество">
                    </div>
                    
                    <div class="form-group">
                        <label>Возраст:</label>
                        <input min="0" max="120" name="age_post" type="number" class="form-control form-input" placeholder="Введите возраст">
                    </div>
                    
                    <div class="form-group">
                        <label>Телефон:</label>
                        <input name="number_post" id="phone" type="tel" pattern="+7 ([0-9]{3}) [0-9]{3}-[0-9]{2}-[0-9]{2}" class="form-control form-input" placeholder="Введите телефон">
                    </div>
                    
                    <div class="form-group">
                        <label>Пол:</label>
                        <select name="gender_post" class="selectpicker">
                          <optgroup label="Выберите свой пол">
                            <option value="0">Женский</option>
                            <option value="1">Мужской</option>
                            <option value="3" selected>Не указан</option>
                          </optgroup>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label>Актуальный город:</label>
                        <select name="city_post" class="selectpicker">
                          <optgroup label="Актуальный город">
                            <option value="izhevsk">Ижевск</option>
                            <option value="sarapul">Сарапул</option>
                            <option value="igra">Игра</option>
                            <option value="mozhga">Можга</option>
                            <option value="votkinsk">Воткинск</option>
                            <option value="cambarka">Камбарка</option>
                            <option value="all">Все города</option>
                            <option value="other">Иной город</option>
                            <option value="all" selected>Не указан</option>
                          </optgroup>
                        </select>
                    </div>
                    -->
                    
                    <div class="form-group">
                        <label>Проверка на робота. Введите правильный ответ: '.$a.' + '.$b.' =</label>
                        <input min="0" max="120" name="my_result" type="number" class="form-control form-input" placeholder="Введите ответ">
                    </div>
                        <input type="hidden" name="true_result" value="'.$result.'">
                    
                    <div class="checkbox">
                          <input id="assent_id" name="assent" class="checkbox_style" type="checkbox" value="">
                          <label for="assent_id">Признаю, что несу полную ответственность 
                        за предоставленные мною данные, а так же
                        принимаю условия <a href="/agreement" class="agree_link">пользовательского соглашения</a></label>
                    </div>


                    <button type="submit" class="btn btn-default button_message button_'.$color_style.'">Зарегистрироваться</button>
                </form>',
                
                "$color_style",
            );
            
            plus_window_message($message_array);
        ?>
      

    </div>

    <?php require_once(ROOT.'/components/Footer.php'); ?>
    <script>
    $(function(){
      $("#phone").mask("+7(999) 999-99-99");
    });   
    </script>
  </body>
</html>