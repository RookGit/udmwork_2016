<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Теги | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU">
    <meta name="author" content="">
    <title>Теги | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT.'/components/Head_files.php'); ?>
	<script>
		function change_search_type(num_search) {
			switch (num_search) {
			  case 1:
				$("#search_type_1").attr("class","hello_search_type_active");
				$("#search_type_2").attr("class","hello_search_type");
				$("#search_type_3").attr("class","hello_search_type");
				$(".form_login").attr("action","/jobs");
				break;
				
			  case 2:
				$("#search_type_1").attr("class","hello_search_type");
				$("#search_type_2").attr("class","hello_search_type_active");
				$("#search_type_3").attr("class","hello_search_type");
				$(".form_login").attr("action","/resume");
				break;
				
			  case 3:
				$("#search_type_1").attr("class","hello_search_type");
				$("#search_type_2").attr("class","hello_search_type");
				$("#search_type_3").attr("class","hello_search_type_active");
				$(".form_login").attr("action","/services");
				break;
			}			
		}
	</script>
<style>


p {font-size: 20px;margin: 5px; text-align:center;}
.parallax{position: absolute;z-index: -1;}

.button {  position: relative;top: 50px;border-top: 1px solid #96d7ff; background: #00548c; background: -webkit-gradient(linear, left top, left bottom, from(#26a8ff), to(#00548c)); background: -moz-linear-gradient(top, #26a8ff, #00548c); background: -ms-linear-gradient(top, #26a8ff, #00548c); background: -o-linear-gradient(top, #26a8ff, #00548c); padding: 5px 10px; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.2); -moz-box-shadow: 0 1px 2px rgba(0,0,0,.2); box-shadow: 0 1px 2px rgba(0,0,0,.2); text-shadow: rgba(0,0,0,.4) 0 1px 0; color: #d9eef7; font-size: 14px; font-family: Helvetica, Arial, Sans-Serif; text-decoration: none; vertical-align: middle; } .button:hover { color: #9ce5ff; background: #1e7cba; background: -webkit-gradient(linear, left top, left bottom, from(#85c6f2), to(#1e7cba)); background: -moz-linear-gradient(top, #85c6f2, #1e7cba); background: -ms-linear-gradient(top, #85c6f2, #1e7cba); background: -o-linear-gradient(top, #85c6f2, #1e7cba); } .button:active { border-top-color: #001a5c; background: #001a5c; margin: 23px 0 0px 0;}

.post-tag{margin:10px 0 35px;}
.post-tag a{background-color:#aaa;border-radius:0 2px 2px 0;color:#fff;text-decoration:none;display:inline-block;font-size:20px;line-height:20px;margin:0 0 2px 10px;padding:4px
7px 3px;position:relative;text-transform:uppercase; transition: 0.2s linear}
.post-tag a:before{transition: 0.2s linear; border-top:10px solid transparent;border-right:8px solid #aaa;border-bottom:10px solid transparent;content:"";height:0;position:absolute;top:0;left:-8px;width:0;}
.post-tag a:after{background-color:#fff;border-radius:50%;content:"";height:4px;position:absolute;top:8px;left:-2px;width:4px}
.post-tag a:hover{background:#444;color:#FFF;text-decoration:none;}
.post-tag a:hover:before{border-right-color:#444}

.post-tag2{margin:-10px 0 35px;}
.post-tag2 a{background-color:#FFCC33;border-radius:0 2px 2px 0;color:#000;text-decoration:none;display:inline-block;font-size:20px;line-height:20px;margin:0 0 2px 10px;padding:4px
7px 3px;position:relative;text-transform:uppercase; transition: 0.2s linear}
.post-tag2 a:before{transition: 0.2s linear; border-top:10px solid transparent;border-right:8px solid #FFCC33;border-bottom:10px solid transparent;content:"";height:0;position:absolute;top:0;left:-8px;width:0;}
.post-tag2 a:after{background-color:#333;border-radius:50%;content:"";height:4px;position:absolute;top:8px;left:-2px;width:4px}
.post-tag2 a:hover{background:#444;color:#FFF;text-decoration:none;}
.post-tag2 a:hover:before{border-right-color:#444}
.post-tag2 a:hover:after{transition: 0.2s linear;background-color:#fff;border-radius:50%;content:"";height:4px;position:absolute;top:8px;left:-2px;width:4px important;}

.post-tag3{margin:-10px 0 35px;}
.post-tag3 a{background-color:#CC0000;border-radius:0 2px 2px 0;color:#fff;text-decoration:none;display:inline-block;font-size:20px;line-height:20px;margin:0 0 2px 10px;padding:4px
7px 3px;position:relative;text-transform:uppercase; transition: 0.2s linear}
.post-tag3 a:before{transition: 0.2s linear; border-top:10px solid transparent;border-right:8px solid #CC0000;border-bottom:10px solid transparent;content:"";height:0;position:absolute;top:0;left:-8px;width:0;}
.post-tag3 a:after{background-color:#fff;border-radius:50%;content:"";height:4px;position:absolute;top:8px;left:-2px;width:4px}
.post-tag3 a:hover{background:#99FF66;color:#333;text-decoration:none;}
.post-tag3 a:hover:before{border-right-color:#99FF66}

.post-tag4{margin:-10px 0 35px;}
.post-tag4 a{background-color:#003366;border-radius:0 2px 2px 0;color:#fff;text-decoration:none;display:inline-block;font-size:11px;line-height:13px;margin:0 0 2px 10px;padding:4px
7px 3px;position:relative;text-transform:uppercase; transition: 0.2s linear}
.post-tag4 a:before{transition: 0.2s linear; border-top:10px solid transparent;border-right:8px solid #003366;border-bottom:10px solid transparent;content:"";height:0;position:absolute;top:0;left:-8px;width:0;}
.post-tag4 a:after{background-color:#fff;border-radius:50%;content:"";height:4px;position:absolute;top:8px;left:-2px;width:4px}
.post-tag4 a:hover{background:#0099CC;color:#000;text-decoration:none;}
.post-tag4 a:hover:before{border-right-color:#0099CC}
</style>	
  </head>
  <body>
    <?php
        require_once(ROOT . '/components/Header.php');
    ?>
	



<div class="container-fluid">

	<div class="row">

		<div class="content">

			
			<div class="col-xs-12 post-tag">
				<h3>Теги для вакансий:</h3>
				<?php
				$array_jobs = array(
				"Менеджер", 
				"Официант", 
				"Мерчендайзер", 
				"Учитель", 
				"Охранник", 
				"Водитель", 
				"Администратор", 
				"Маркетолог", 
				"Грузчик", 
				"Курьер", 
				"Продавец", 
				"Товаровед", 
				"Оператор", 
				"Программист", 
				"Секретарь", 
				"Вахта", 
				"Разнорабочий", 
				"Офис", 
				"Кадровик", 
				"Сборщик", 
				"Сварщик", 
				"Бухгалтер", 
				"Наборщик"
				);
				shuffle ($array_jobs );
				foreach ($array_jobs as $value)
				{
				?>
				<a rel="tag" href="https://udmwork.ru/jobs/all_city/all_time/all_type/time/<?php echo $value; ?>/1"><?php echo $value; ?></a> 
				<?php
				}
				?>


			</div>

			
			<div class="col-xs-12 post-tag2">
				<h3>Теги для услуг:</h3>
				<?php
					$array_services = array(
						"Дизайн", 
						"Ногти", 
						"Авто", 
						"Верстка", 
						"Разработка"
					);
					shuffle ($array_services );
					foreach ($array_services as $value)
					{
				?>
				<a rel="tag" href="https://udmwork.ru/services/all_city/all_time/all_type/time/<?php echo $value; ?>/1"><?php echo $value; ?></a> 
				<?php
					}
				?>

			</div>

			
			<div class="col-xs-12 post-tag3"> 
				<h3>Теги для резюме:</h3>
				<?php
					$array_resume = array(
						"Менеджер", 
						"Официант", 
						"Мерчендайзер", 
						"Учитель", 
						"Охранник", 
						"Водитель", 
						"Администратор", 
						"Маркетолог", 
						"Грузчик", 
						"Курьер", 
						"Продавец", 
						"Товаровед", 
						"Оператор", 
						"Программист", 
						"Секретарь", 
						"Вахта", 
						"Разнорабочий", 
						"Офис", 
						"Кадровик", 
						"Сборщик", 
						"Сварщик", 
						"Бухгалтер", 
						"Наборщик"
					);
						shuffle ($array_resume );
						foreach ($array_resume as $value)
					{
				?>
				<a rel="tag" href="https://udmwork.ru/resume/all_city/all_time/all_type/time/<?php echo $value; ?>/1"><?php echo $value; ?></a> 
				<?php
					}
				?>
			</div>

		</div>	

	</div>
</div>  
      
    <?php require_once(ROOT.'/components/Footer.php'); ?>
</html>