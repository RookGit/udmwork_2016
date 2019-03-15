<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Разработчкам | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU">
    <meta name="author" content="">
    <title>Разработчкам | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT . '/components/Head_files.php'); ?>
    <link rel="shortcut icon" href="/template/images/favicon.ico" type="image/x-icon">
    <link href="/template/css/style_file.min.css" rel="stylesheet">
    <link href="/template/css/hello.css" rel="stylesheet">
    <script src="/template/js/site/search_hello.js"></script>
</head>
<body class='body_header'>
<?php
require_once(ROOT . '/components/Header_api.php');
?>
<div class="container-fluid">
    <div class="row">

        <div class="col-xs-12 api_header">
            Разработчикам
        </div>

        <div class="col-xs-6">
            <div class="col-xs-12 card">
                Чтобы начать пользоваться UDMWORK API нужно связаться с администрацией сайта и получить ключ вида:<br/>
                <font class="api_key">dsnU7uhsafd2934uy9h9f</font>
            </div>

            <div class="col-xs-12 card">
                У меня уже есть ключ и я хочу
                войти в API-PANEL
            </div>
        </div>



            <div class="col-xs-6 card card_right">
                <ins>Что я смогу делать, получив доступ к api?</ins><br/>
                - Использовать материалы сайта для своих проектов, минуя злостный парсинг больших страниц <br/>
                - Возможность отображать данные с нашего сайта в своих проектах, сделав их интереснее для
                посетителей<br/>
                - Получать данные с быстрой скоростью благодаря api, построенному на node.js и socket.io<br/>
                - Иметь доступ к понятной документации с примерами и постоянными обновлениями<br/>
            </div>


    </div>
</div>

<?php require_once(ROOT . '/components/Footer.php'); ?>
</body>
</html>

<style>
    .body_header {
        background-color: #5976a5;
    }

    .api_key {
        color: #d2d200;
        font-size: 25px;
    }

    .api_header {
        margin-bottom: -10px;
        padding: 20px;
        font-size: 20px;
        text-align: center;
    }

    .card {
        border: 15px solid #5976a5;
        color: #5976a5;
        background-color: white;
        padding: 20px;
        font-size: 20px;
        text-align: center;
        height: auto;
        transition: 0.5s;
    }

    .card_right {
        border: 15px solid #5976a5;
        color: #5976a5;
        background-color: white;
        padding: 20px;
        font-size: 20px;
        text-align: left;
        height: auto;
    }

    .card:hover {
        cursor: pointer;
        transform: scale(0.98);
    }
</style>