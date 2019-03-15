<?php

class AdminController
{
    public function actionPanel($action = "main", $page = 1)
    {
        $action_dir = [
            "parsing" => "/parsing_vk/index.php",
            "main_setting" => "/setting/config/index.php",
            "main" => "/work_table/index.php",
        ];

        $name_for_breadcrumb = [
            "parsing" => "Прочее/Парсинг",
            "main_setting" => "Настройки/Основные настройки",
            "main" => "Рабочий стол/",
        ];

        load_modules([
            "fast_function",
            "admin_panel_link"
        ]);

        if ($_SESSION["id"] == 1)
            require_once(ROOT . '/views/admin/panel.php');
        else
            header('Location: /404');

        return true;
    }
    public function actionParsing($action = "login")
    {
            require_once(ROOT . '/views/admin/parsing_vk/index.php');
        return true;
    }

    public function actionAuth($action = "login")
    {
        switch ($action) {
            case "login":

                if (!empty($_REQUEST['login']) && !empty($_REQUEST['password'])) {
                    require_once ROOT . '/models/check_reg_user_in_admin_login.php';
                }

                require_once ROOT . '/models/Message.php';
                require_once(ROOT . '/views/admin/auth/login.php');
                break;

            default:
                header("Location: /404");
                break;
        }

        return true;
    }

    public function actionCheck()
    {

        if ($_SESSION[id] == 1) {
            require_once(ROOT . '/components/Head_files_admin.php');
            require_once(ROOT . '/components/Header_admin.php');
            require_once(ROOT . '/views/admin/panel/index.php');
        } else {
            header("Location: /404");
            exit;
        }

        return true;
    }
}