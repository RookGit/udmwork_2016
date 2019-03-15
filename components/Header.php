<div id='site_header' class="navbar navbar-inverse navbar-fixed-top navbar" style="background-color: <?= Config::get_data("theme_color") ?>;" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a id="logotype" class="navbar-brand" href="/">
                <font id='logo_text_start'>UDMWORK</font><font id='logo_text_end'>.RU</font>
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="li_menu"><a href="/jobs"><font class="font_menu" id="jobs">Вакансии</font></a></li>
                <li class="li_menu"><a href="/services"><font class="font_menu" id="services">Услуги</font></a></li>
                <li class="li_menu"><a href="/resume"><font class="font_menu" id="resume">Резюме</font></a></li>
                <li class="li_menu"><a href="/tags"><font class="font_menu" id="tags">Теги</font></a></li>
                <?php
                if (isset($_SESSION['id'])) {
                    $login_menu_value = "Личный кабинет";
                    $login_href_value = "my_cabinet/resume/1";
                } else {
                    $login_menu_value = "Вход / Регистрация";
                    $login_href_value = "login";
                }
                ?>
                <li class="li_menu"><a href="/<?=$login_href_value; ?>"><font class="font_menu" id="cabinet"
                        ><?=$login_menu_value; ?></font></a>
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

<!-- Search panel -->
<div class="modal fade bd-example-modal-sm_2 z_index_max" tabindex="-1" role="dialog"
     aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Быстрый поиск</h4>
            </div>
            <div class="modal-body">

                <p class="modal_text">Что ищем?</p>

                <select name="city_post" class="selectpicker type_ads">
                    <optgroup label="Что ищем?">
                        <option value="jobs">Вакансии</option>
                        <option value="resume">Резюме</option>
                        <option value="services">Услуги</option>
                    </optgroup>
                </select>
                <br><br>
                <p class="modal_text">Текст для поиска:</p>

                <input type="text" class="form-control form-control_search search_text" placeholder="Текст для поиска">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Я передумал</button>
                <button type="button" onclick="go_search()" class="btn btn-primary btn_refresh">Искать
                </button>
            </div>
        </div>
    </div>
</div>

<div class="header_seacrh">
    <button type="button" class="btn btn-default header_seacrh_btn" data-toggle="modal"
            data-target=".bd-example-modal-sm_2">
        <span class="glyphicon glyphicon-search"></span>
    </button>
</div>