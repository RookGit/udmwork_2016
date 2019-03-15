<?php
$file = ROOT . "/views/admin/modules/parsing_vk/vk_token.txt";

if (!empty($_POST['vk_token'])) {
    $current = $_POST['vk_token'];
    file_put_contents($file, $current);
} else {
    $current = file_get_contents($file);
}

?>
<style>
    .header_parsing {
        height: 30px;
        display: block;
        padding: 5px;
        margin: 10px;
        color: black;
        background-color: #f1f7ec;
        border-radius: 5px;
        transition: 1s;
    }

    .result_parsing {
        display: block;
        padding: 5px;
        margin: 10px;
        color: black;
        background-color: #f1f7ec;
        border-radius: 5px;
        transition: 1s;
        cursor: pointer;
    }

    .result_parsing:hover {
        background-color: #e3e9de;
    }

    .link_parsing {
        color: white;
        background-color: #3d649f;
        border-radius: 5px;
        padding: 5px;
        margin: 2px;
        cursor: pointer;
    }

</style>


<script>
    function copyToClipboard(elem) {
        $(elem).hide(100);
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch (e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }

    function paste_site(elem) {
        var text = $(elem).text();
        $("[name=group]").val(text);
    }

    function set_count_for_parsing(elem) {
        var count = $(elem).text();
        $("#input_count").val(count);
    }


    function send_request(elem) {
        var text = $(elem).text();
        $(elem).hide(100);
        var vk_token = $(".vk_token").val();
        var vk_api = "https://api.vk.com/method/wall.post?owner_id=-147576106&from_group=1&message=" + text + "&access_token=" + vk_token + "&v=5.78";
        var vk_api_repost = "https://api.vk.com/method/wall.repost?object=wall-147576106_3107&&access_token=" + vk_token + "&v=5.78";
//        window.open(vk_api, "_blank");
//        window.open(vk_api_repost, "_blank");


        $.ajax({
            url: vk_api,
            method: "GET",
            dataType: "JSONP",
            success: function (data) {
                $(elem).hide(100);
            }
        })
            .fail(function (data) {
                console.log(data);
                alert('Произошла какая-то ошибка');
            });

    }
</script>

<form action="" method="POST">
    <p> Количество: <input id="input_count" type="number" name="count" value="20"/>
        <span onclick="set_count_for_parsing(this)" class="link_parsing">5</span>
        <span onclick="set_count_for_parsing(this)" class="link_parsing">10</span>
        <span onclick="set_count_for_parsing(this)" class="link_parsing">20</span>
        <span onclick="set_count_for_parsing(this)" class="link_parsing">30</span>
        <span onclick="set_count_for_parsing(this)" class="link_parsing">50</span>
    </p>
    <a target="_blank" href="https://oauth.vk.com/authorize?client_id=6495623&scope=photos,audio,video,docs,notes,pages,status,offers,questions,wall,groups,messages,email,notifications,stats,ads,offline,docs,pages,stats,notifications&response_type=token">Получить token</a>

    <p> VK TOKEN: <input type="text" name="vk_token" class="vk_token" value="<?=$current?>"/></p>
    <p> Группы для парсинга:
        <span onclick="paste_site(this)" class="link_parsing">hr_rabota_v_izhevske</span>
        <span onclick="paste_site(this)" class="link_parsing">prostie0109</span> <br></p>
    <p> Группа: <input type="text" name="group" class="group_listen" value="hr_rabota_v_izhevske"/></p>
    <p><input class="btn btn-success" type="submit" value="Начать парсинг"/></p>
</form>

<?php


// Запарсить страниц:

$count_list = $_POST['count'];
$group_link = $_POST['group'];
$vk_token = $current;

if (!empty($count_list) && !empty($group_link) && !empty($vk_token)) {
    require_once("simple_html_dom.php");
    for ($i = 1; $i < $count_list + 1; $i++) {
        $data = file_get_html('https://m.vk.com/' . $group_link . '?offset=' . ($i * 5));

        if ($data->innertext != '' and count($data->find('a'))) {
            foreach ($data->find('a') as $a) {
                if (preg_match("~/wall-[0-9]+_[0-9]+~", $a->href) && $a->plaintext != "Показать полностью…") {
                    $link = 'https://vk.com' . $a->href;

                    $html = file_get_html($link);

                    foreach ($html->find('.pi_text') as $result_wall) {
                        $result_final = $result_wall->plaintext;
                        /*
                        echo "<textarea class='header' cols='50' maxlength='50'
                            placeholder='Шапка'></textarea>";

                        echo "<textarea class='header' cols='50' maxlength='50'
                            placeholder='Телефон'></textarea>";

                        echo "<textarea class='header' cols='50' maxlength='50'
                            placeholder='Email'></textarea>";

                        echo "<textarea class='header' cols='50' maxlength='50'
                            placeholder='Категория'></textarea>";

                        echo "<textarea class='header' cols='50' maxlength='50'
                            placeholder='Описание'></textarea>";
                        */
                        if (!preg_match("~(vk.cc)|(зарегистрироваться)|(дополнительный заработок)~", $result_final))
                            if (preg_match("~((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}~", $result_final))
                                if (strlen($result_final) > 150)
                                    echo "<a onclick='send_request(this)' class='result_parsing'>" . $result_final . "</a>";

                        unset($result_final);
                    }

                    $html->clear();
                    unset($html);
                }
            }
        }


        //$data->clear();
        unset($data);
    }
}

?>
