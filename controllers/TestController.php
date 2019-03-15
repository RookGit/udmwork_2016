<?php


final class TestController
{

    public function actionSearch($field = null)
    {
        if ($field == "robots.txt")
            require_once(ROOT . '/views/test/robots.txt');
        else {
            if (file_exists(ROOT . '/views/test/' . $field . '.php'))
                require_once(ROOT . '/views/test/' . $field . '.php');
            else {
                header("Location: /404");
                exit;
            }
        }

        return true;
    }

}

