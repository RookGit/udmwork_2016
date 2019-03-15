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
                <font id='logo_text_start'>UDMWORK</font><font id='logo_text_end'> Admin</font>
            </a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="li_menu"><a href="/" target="_blank"><font class="font_menu" id="services">Вернуться на сайт</font></a></li>

            </ul>
        </div>
    </div>
</div>


<script>
    var url = window.location.pathname;
    var link = url.split('/', 2);
    var set_select = false;


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
