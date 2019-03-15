<style>

    .input_text {
        padding: 3px;
        border-radius: 5px;
        border: black 1px solid;
    }

    .input_vk_link {
        width: 700px;
    }

    .input_theme_site {
        width: 100px;
    }


</style>

<form action="<?= $_SERVER["REQUEST_URI"] ?>" method = "POST" >
    <p> Фотография для Вк: <input class="input_text input_vk_link" type = "text" name = "count" value = "<?=Config::get_data("img_link")?>" /> </p>
    <p> Цвет темы: <input class="input_text input_theme_site" type = "text" name = "count" value = "<?=Config::get_data("theme_color")?>" /> </p>
    <!--
    <p> Включить снег: <input class="input_text input_theme_site" type = "text" name = "count" value = "<?=Config::get_data("theme_color")?>" /> </p>
    -->
    <p> Префикс для административных страниц: <input class="input_text input_vk_link" type = "text" name = "count" value = "<?=Config::get_data("admin_token_prefix")?>" /> </p>
    <!--
    <p> Режим разработки: <input class="input_text input_vk_link" type = "text" name = "count" value = "<?=Config::get_data("admin_token_prefix")?>" /> </p>
    -->
    <p > <input class="btn btn-success" type = "submit" value="Сохранить настройки"/></p >
</form>