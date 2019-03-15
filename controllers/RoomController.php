<?php


class RoomController
{

    public function actionExit()
    {
        unset($_SESSION['id']);
        header('Location: /');
        exit;
        return true;
    }

    public function actionPlus($table_plus = "resume")
    {
        $this->checkTable($table_plus);

        if ($this->checkTable($table_plus))
            require_once(ROOT . '/views/room/plus_' . $table_plus . '.php');


        return true;
    }


    public function actionPlusAdsTest($table_plus = "")
    {
        include_once ROOT . '/models/Message.php';
        $this->checkAuth();

        if ($this->checkTable($table_plus))
            require_once(ROOT . '/views/ads/test_plus_' . $table_plus . '.php');

        return true;
    }

    private function checkAuth()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: /authentication_warning');
            exit;
        }
    }

    private function checkTable($table): bool
    {
        switch ($table) {
            case "jobs":
                return true;
                break;

            case "resume":
                return true;
                break;

            case "services":
                return true;
                break;

            default:
                header('Location: /404');
                exit;
        }
    }

}

