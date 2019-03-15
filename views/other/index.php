<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Главная страница | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU">
    <meta name="author" content="">
    <title>Главная страница | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT . '/components/Head_files.php'); ?>

    <!-- Landing css -->
    <link href="/template/css/hello.css" rel="stylesheet">

    <!-- VK API -->
    <script src="https://vk.com/js/api/openapi.js?154" type="text/javascript"></script>

    <!-- Animation libs -->
    <script src="/template/js/fm.revealator.jquery.js"></script>
    <link href="/template/css/fm.revealator.jquery.css" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

</head>
<body class='back_hello'>
<?php
require_once(ROOT . '/components/Header.php');
?>
<div class="container-fluid">
    <div class="row">

        <section class="col-xs-12 page_header">
            <div class="col-xs-12 col-sm-6">
                <h1>UDMWORK</h1>
                <h3>Работа и услуги Удмуртии в одном месте</h3>
                <blockquote><p>Наш девиз - никаких коммерческих услуг!</p></blockquote>
                <a target="_blank" href="http://udmworknew.loc/agreement" type="button" class="btn btn-success">Подробнее о нас</a>

            </div>

            <div class="col-xs-12 col-sm-6">
                <img class="img-responsive" alt="UDMWORK - УВЕРЕННОСТЬ В БУДУЩЕМ"
                     src="/template/images/landing_pc.png"/>
            </div>
        </section>

        <section class="col-xs-12 page_2">
            <div class="col-xs-12 col-sm-2 card text-center revealator-slideright revealator-once">

                <span class="glyphicon glyphicon-search card_icon_size"></span>

                <h3>Поиск</h3>
            </div>
            <div class="col-xs-12 col-sm-2 card text-center revealator-slideright revealator-once">

                <span class="glyphicon glyphicon-plus-sign card_icon_size"></span>

                <h3>Бесплатно</h3>
            </div>
            <div class="col-xs-12 col-sm-2 card text-center revealator-slideright revealator-once">

                <span class="glyphicon glyphicon-tasks card_icon_size"></span>

                <h3>Адаптивность</h3>
            </div>
            <div class="col-xs-12 col-sm-2 card text-center revealator-slideleft revealator-once">

                <span class="glyphicon glyphicon-gift card_icon_size"></span>

                <h3>Подарки</h3>
            </div>
            <div class="col-xs-12 col-sm-2 card text-center revealator-slideleft revealator-once">

                <span class="glyphicon glyphicon-ok-sign card_icon_size"></span>

                <h3>Надежность</h3>
            </div>
            <div class="col-xs-12 col-sm-2 card text-center revealator-slideleft revealator-once">

                <span class="glyphicon glyphicon-phone card_icon_size"></span>

                <h3>Комфорт</h3>
            </div>
        </section>

        <section class="col-xs-12 page_3">

            <div class="col-xs-12 col-sm-6">

                <!-- VK Widget -->
                <div id="vk_groups" class="revealator-slideright revealator-once"></div>
                <script type="text/javascript">
                    VK.Widgets.Group("vk_groups", {mode: 3, width: "auto", height: "400"}, 147576106);
                </script>
            </div>

            <div class="col-xs-12 col-sm-6 text-center">
                <br/>
                <h3>Подписывайтесь на нас в социальных сетях!</h3>
                <h4>Не упустите вакантные места :)</h4>
                <a href="https://vk.com/udmwork" target="_blank" type="button" class="btn_soc btn btn-success btn-lg revealator-fade revealator-once">
                    <i class="fa fa-vk pull-left soc_icon"></i> Вконтакте</a>
                <a href="https://twitter.com/udmwork" target="_blank" type="button" class="btn_soc btn btn-primary btn-lg revealator-fade revealator-once">
                    <i class="fa fa-twitter pull-left soc_icon"></i> Twitter</a>
                <a href="#" type="button" target="_blank" class="btn_soc btn btn-warning btn-lg revealator-fade revealator-once">
                    <i class="fa fa-odnoklassniki pull-left soc_icon"></i> OK</a>
                <br/>
                <br/>
            </div>
        </section>

        <section class="hidden-xs col-md-12 slider-pages">

            <article class="js-scrolling__page js-scrolling__page-1 js-scrolling--active">
                <div class="slider-page slider-page--left">
                    <div class="slider-page--skew">
                        <div class="slider-page__content">
                        </div>
                        <!-- /.slider-page__content -->
                    </div>
                    <!-- /.slider-page--skew -->
                </div>
                <!-- /.slider-page slider-page--left -->

                <div class="slider-page slider-page--right">
                    <div class="slider-page--skew">
                        <div class="slider-page__content">
                            <!-- /.slider-page__title slider-page__title--big -->
                            <span class="slider-page__title--big"><ins>UDMWORK ANDROID APP:</ins></span>
                            <p class="slider-page__description">
                                Специально для Вас мы сделали приложение для android устройств. Со временем его функционал будет расширен!
                            </p>
                            <a target="_blank" href="https://play.google.com/store/apps/details?id=ru.rookdev.udmwork" type="button" class="btn btn-danger btn-lg"><i class="fa fa-android pull-left soc_icon"></i> Установить</a>
                            <!-- /.slider-page__description -->
                        </div>
                        <!-- /.slider-page__content -->
                    </div>
                    <!-- /.slider-page--skew -->
                </div>
                <!-- /.slider-page slider-page--right -->
            </article>
            <!-- /.js-scrolling__page js-scrolling__page-1 js-scrolling--active -->



            <article class="js-scrolling__page js-scrolling__page-2">
                <div class="slider-page slider-page--right">
                    <div class="slider-page--skew">
                        <div class="slider-page__content">
                        </div>
                        <!-- /.slider-page__content -->
                    </div>
                    <!-- /.slider-page--skew -->
                </div>
                <!-- /.slider-page slider-page--left -->

                <div class="slider-page slider-page--left">
                    <div class="slider-page--skew">
                        <div class="slider-page__content">
                            <!-- /.slider-page__title slider-page__title--big -->
                            <span class="slider-page__title--big"><ins>UDMWORK VK APP:</ins></span>
                            <p class="slider-page__description">
                                Для того, чтобы Вы имели быстрый доступ к сайту мы создали приложение UDMWORK во Вконтакте. Мгновенная регистрация!
                            </p>
                            <a target="_blank" href="https://vk.com/app6167437_-147576106" type="button" class="btn btn-primary btn-lg"><i class="fa fa-vk pull-left soc_icon"></i> Перейти</a>
                            <!-- /.slider-page__description -->
                        </div>
                        <!-- /.slider-page__content -->
                    </div>
                    <!-- /.slider-page--skew -->
                </div>
                <!-- /.slider-page slider-page--right -->
            </article>
            <!-- /.js-scrolling__page js-scrolling__page-1 js-scrolling--active -->



        </section>

        <script src="/template/js/slider_1.js"></script>

    </div>
</div>
<?php require_once(ROOT . '/components/Footer.php'); ?>
</body>
</html>