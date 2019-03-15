<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Главная страница | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU">
		<meta name="author" content="">
		<title>Главная страница | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
		<?php require_once(ROOT.'/components/Head_files.php'); ?>
		<link rel="shortcut icon" href="/template/images/favicon.ico" type="image/x-icon">
		<link href="/template/css/style_file.min.css" rel="stylesheet">
		<link href="/template/css/hello.css" rel="stylesheet">
		<script src="/template/js/site/search_hello.js"></script>
	</head>
	<body class='back_hello'>
		<?php
			require_once(ROOT . '/components/Header.php');
		?>
		<div class="container-fluid">       
			<div class="row">
				<div class="news_field">
					<div class="news_field_first">
						В разработке Android-приложение UDMWORK <br>
						Будьте в курсе всех последних вакансий, резюме и услуг по
						Удмуртии и Ижевску не заходя на сам сайт!
					</div>
					<div class="news_field_second">
						<div style="
						background-image: url('/template/images/phone_hor.png');" class="img_field"></div>
					</div>
				</div>
				<div class="news_field" style="
						background-image: url('https://static.schools.by/images/header-bg/img-17.jpg');">
					<div class="news_field_second">
						<div style="
						background-image: url('/template/images/hello4.jpg');" class="img_field"></div>
					</div>
					<div style="color: black;" class="news_field_first">
						В разработке Android-приложение UDMWORK <br>
						Будьте в курсе всех последних вакансий, резюме и услуг по
						Удмуртии и Ижевску не заходя на сам сайт!
					</div>
				</div>
				<div class="col-xs-12 form_login_index">
					<form class="form_login" role="form" method="POST" action="/jobs">
						<div class="col-xs-12 head_search">
							<label>Найти: 
								<font id="search_type_1" onclick="change_search_type(1)" class="hello_search_type_active">Вакансию</font> | 
								<font id="search_type_2" onclick="change_search_type(2)" class="hello_ads_type">Резюме</font> | 
							<font id="search_type_3" onclick="change_search_type(3)" class="hello_ads_type">Услугу</font></label>
							<div class="input-group search_text_form">
								<input name="search_post" type="text" class="form-control" placeholder="Введите текст для поиска">
								<span class="input-group-btn">
									<button class="btn btn-default" type="submit">Найти</button>
								</span>
							</div>
						</div>
						<div class="form-group text-center"></div>
					</form>
				</div>
				<div class="col-xs-12 center hello_h3" >
					<h3><font class="anim hello_udmwork"><font class="star">★★★★</font>★ UDMWORK ★<font class="star">★★★★</font></font> <br> Бесплатная площадка для поиска и размещения объявлений</h3>
				</div>
				<div class="col-xs-12 col-sm-12 starter-template_2">
					<div class='starter-template window_message window_message_yellow'>
						<h1 class='header_message header_message_yellow'>Важные новости:</h1>
						<div class='news_hello_first'><b>28.11.17:</b> В разработке UDMWORK API 0.1- для взаимодействия сайта с android, ios, windows phone системами</div>
						<div class='news_hello'><b>26.09.17:</b> Открылась новая версия сайта. Теперь он стал полностью адаптивным под Ваши устройства</div>
						<div class='news_hello'><b>05.09.17:</b> Мы открыли приложение Вконтакте: https://vk.com/app6167437</div>
						<div class='news_hello'><b>01.09.17:</b>  Добавили возможность выделять объявления для привлечения внимания пользователей.</div>
						<div class='news_hello_last'><b>28.08.17:</b> Добавили возможность поделиться какой-либо вакансией, резюме, услугой во Вконтакте</div>
					</div>
				</div>
				<div class="col-xs-12 center hello_h3" >
					<h3>Почему UDMWORK?</h3>
				</div>
				<div class="col-xs-12 col-sm-6 border">
					<ul>
						<li>Любое размещение объявлений абсолютно бесплатно!</li>
						<li>Мы рассказываем о Ваших объявлениях в нашу группу Вконтакте, которая
							охватывает 3000 человек по Удмуртии!
						</li>
						<li>На площадке UDMWORK нет никаких платных услуг!</li>
						<li>Каждый день мы начисляем Вас бонус для продвижения Ваших объявлений!</li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 border">
					<ul>
						<li>Быстрая регистрация (Рекорд: 10 секунд!)</li>
						<li>Приятный дизайн сайта!</li>
						<li>Кроме вакансий и резюме можно размещать и услуги!</li>
						<li>Мы имеем свое приложение Вконтакте, что упрощает процесс регистрации и входа!</li>
						<li>UDMWORK нацелен на Удмуртию и Ижевск в частности!</li>
					</ul>
				</div>
				<div class="hello_img_div col-xs-12 hidden-xs col-sm-4 col-md-3 starter-template_2">
					<div class="text_hello">Счастье</div>
					<img width="200" height="200" src="/template/images/hello1.jpg" alt="Счастье" class="img-rounded hello_img">    
				</div>
				<div class="hello_img_div col-xs-12 hidden-xs col-sm-4 col-md-3 starter-template_2">
					<div class="text_hello">Радость</div>
					<img width="200" height="200"  src="/template/images/hello2.jpg" alt="Радость" class="img-rounded hello_img">    
				</div>
				<div class="hello_img_div col-xs-12 col-sm-4 col-md-3 starter-template_2">
					<div class="text_hello">Успех</div>
					<img width="200" height="200"  src="/template/images/hello3.jpg" alt="Успех" class="img-rounded hello_img">    
				</div>
				<div class="hello_img_div col-xs-12 hidden-xs col-sm-4 col-md-3 hidden-sm starter-template_2">
					<div class="text_hello">Дружба</div>
					<img width="200" height="200"  src="/template/images/hello4.jpg" alt="Дружба" class="img-rounded hello_img">    
				</div>
				<div class="col-xs-12 starter-template_2">
					<div class='starter-template window_message window_message_blue'>
						<h1 class='header_message header_message_blue'>Наши партнеры:</h1>
						<a href='https://vk.com/club154646147' class='news_hello_first'><b>Developer's Studio "Rook":</b> <br>- Студия, которая разрабатывает сайты и приложения на различные платформы</a>
						<a href='https://vk.com/coolrow' class='news_hello'><b>CoolRow Framework:</b> <br>- Замечательная веб основа для программистов</a>
						<a href='https://vk.com/club146125478' class='news_hello_last'><b>Дизайнерская студия "Золотой стандарт":</b> <br>- Дизайнерская студия для разработки любого оформления</a>
					</div>
				</div>
			</div>
		</div>
		<?php require_once(ROOT.'/components/Footer.php'); ?>
	</body>
</html>