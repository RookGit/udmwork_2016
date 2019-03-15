<div id='site_header' class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="logotype" class="navbar-brand" href="/for_developers">
                <font id='logo_text_start'>UDMWORK</font><font id='logo_text_end'> API 0.1</font>
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="li_menu"><a href="#"><font class="font_menu" id="jobs">Запросы</font></a></li>
                <li class="li_menu"><a href="#"><font class="font_menu" id="services">Новости</font></a></li>
                <li class="li_menu"><a href="#"><font class="font_menu" id="resume">Пожелания</font></a></li>
                <li class="li_menu"><a href="/hello"><font class="font_menu" id="tags">Вернуться на сайт</font></a></li>
                <?php
                if (isset($_SESSION['id'])) {
                    $login_menu_value = "Личный кабинет";
                    $login_href_value = "my_cabinet/resume/1";
                } else {
                    $login_menu_value = "Вход / Регистрация";
                    $login_href_value = "login";
                }
                ?>
                <li class="li_menu"><a href="/<?php echo $login_href_value; ?>"><font class="font_menu" id="cabinet"
                                                                                      class="li_menu"><?php echo $login_menu_value; ?></font></a>
                </li>
            </ul>
        </div>
    </div>
</div>


<script>
    var url = window.location.pathname;
    var link = url.split('/', 2);
    var set_select = false;

    switch (link[1]) {
        case "login":
            $("#cabinet").addClass("active_li");
            break;

        case "reg":
            $("#cabinet").addClass("active_li");
            break;

        case "tags":
            $("#tags").addClass("active_li");
            break;

        case "my_cabinet":
            $("#cabinet").addClass("active_li");
            break;

        case "jobs":
            $("#jobs").addClass("active_li");
            set_select = true;

            break;

        case "resume":
            $("#resume").addClass("active_li");
            set_select = true;
            break;

        case "services":
            $("#services").addClass("active_li");
            set_select = true;
            break;
    }


    function set_select_width() {


        if (set_select == true) {

            if (window.innerWidth < 520) {

                $("select").attr("data-width", "90%");
            }
            else {
                $("select").attr("data-width", "");
            }

        }
    }
    $(document).ready(function () {
        set_select_width();
    });


</script>
