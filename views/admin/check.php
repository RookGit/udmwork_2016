<?php

if ($type != null and $_SESSION['id'] == 1) {
    echo "Таблица: " . $table;
    echo "<br>Номер объявления: " . $number . "<br>";

    switch ($type) {

        case "block_ads":
            echo "Действие: забанить объявление";
            break;

        case "block_user":
            echo "Действие: забанить пользователя";
            require_once(ROOT . '/views/admin/block_user.php');
            break;

        case "user_accout":
            echo "Действие: посмотреть аккаунт пользователя";
            break;

        case "plus_see_this":
            echo "Действие: добавить 5 просмотров данному объявлению";
            break;

        case "plus_random_see":
            echo "Действие: добавить случайное количество просмотров всем объявлениям";
            require_once(ROOT . '/views/admin/plus_random_see.php');
            break;

        case "plus_see":
            echo "Действие: добавить 3 просмотра всем объявлениям";
            break;

        case "move_to_resume":
            echo "Действие: переместить вакансию в резюме";
            break;

        case "move_to_jobs":
            echo "Действие: переместить резюме в вакансии";
            require_once(ROOT . '/views/admin/move_to_jobs.php');
            break;

        case "plus_random_see_week":
            echo "Действие: добавить n просмотров всем объявлением не раннее недели";
            require_once(ROOT . '/views/admin/plus_random_see_week.php');
            break;

        case "suspicious_user":
            echo "Действие: пометить пользователя, как подозрительного";
            require_once(ROOT . '/views/admin/suspicious_user.php');
            break;

        case "suspicious_ads":
            echo "Действие: пометить объявление, как подозрительное";
            require_once(ROOT . '/views/admin/suspicious_ads.php');
            break;

        case "delete_ads":
            echo "Действие: удалить данное объявление";
            require_once(ROOT . '/views/admin/delete_ads.php');
            break;

        case "delete_no_moder_ads":
            echo "Действие: удалить не валидные объявления";
            require_once(ROOT . '/views/admin/delete_no_valid_ads.php');
            break;

        default:
            $type = null;
            break;
    }


}

?>

<script>

    setTimeout("closeOpenedWindow()", 20000);

    function closeOpenedWindow() {
        window.close()
    }
</script>
