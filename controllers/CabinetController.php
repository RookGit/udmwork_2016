<?php


class CabinetController
{

    public function actionExit()
    {
        unset($_SESSION['id']);
        header('Location: /hello');
        exit;
        return true;
    }

    public function actionPlus($table_plus = "resume")
    {
        if ($table_plus != "jobs" && $table_plus != "resume" && $table_plus != "services") {
            header('Location: /404');
            exit;
        } else
            require_once(ROOT . '/views/cabinet/plus_' . $table_plus . '.php');

        return true;
    }

}

