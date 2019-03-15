<script>
    if (window.parent.frames.length > 0) {
        $(".container-fluid:eq(0)").addClass("scroll");
    }

    function go_search() {
        var type_ads = $("select.type_ads").val();
        var text_search = $(".search_text").val();
        window.location.href = "https://udmwork.ru/" + type_ads + "/all_city/all_time/all_type/time/" + text_search + "/1";

    }
</script>

<?php
unset($db);
?>
</div>
<div id='footer' style="background-color: <?= Config::get_data("theme_color") ?>;" >
    <b><font color='#f9ffb8'>2017 - <?=date("Y")?> © UDMWORK.RU</font></b>
    / <a class='footer_link' target='_blank' href='http://vk.com/udmwork'>
        <ins>Мы Вконтакте</ins>
    </a>
    / <a class='footer_link' href='/agreement'>
        <ins>Пользовательское соглашение</ins>
    </a>
    <!-- / <a class='footer_link' href='/for_developers'><ins>Разработчикам</ins></a>
    / <a class='footer_link' href='/agreement'><ins>Статьи</ins></a>
      -->
    <a class='footer_link' style='float: right; margin-right: 10px;' target='_blank'
       href='https://vk.com/im?media=&sel=440434126'>
        <ins>Техническая поддержка</ins>
    </a>

</div>

