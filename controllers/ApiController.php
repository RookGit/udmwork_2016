<?php


include_once ROOT . '/models/Ads_function.php';

class ApiController
{

    private function testAuth()
    {
        if (!isset($_SESSION['id'])) {
            header('Location: /404');
            exit;
        }
    }

    private function testTable($table)
    {
        if ($table != "jobs" && $table != "resume" && $table != "services") {
            header('Location: /404');
            exit;
        }
    }

    private function testInteger($id)
    {
        if (!$id > 0) {
            header('Location: /404');
            exit;
        }
    }

    public function actionCabinet($table = "resume", $page = 1)
    {
        $this->testAuth();
        $this->testTable($table);
        $this->testInteger($page);

        require_once(ROOT . '/models/My_ads.php');
        require_once(ROOT . '/views/room/my_room.php');
        return true;
    }

    public function actionGetAllJobs($city_post = "all_city",
                                     $time_post = "all_time",
                                     $type_post = "all_type",
                                     $sort_post = "time",
                                     $search_post = "all_search", $page_now = 1)
    {
        require_once(ROOT . '/views/api/jobs.php');
        return true;
    }

    public
    function actionAdmin($type = null, $table = null, $number = null)
    {
        require_once(ROOT . '/views/admin/check.php');
        return true;
    }

    public function actionGetAllResume($city_post = "all_city",
                                       $time_post = "all_time",
                                       $type_post = "all_type",
                                       $sort_post = "time",
                                       $search_post = "all_search",
                                       $page_now = 1)
    {
        require_once(ROOT . '/views/api/resume.php');
        return true;
    }

    public
    function actionGetAllServices($city_post = "all_city", $time_post = "all_time", $type_post = "all_type", $sort_post = "time", $search_post = "all_search", $page_now = 1)
    {
        require_once(ROOT . '/views/api/services.php');
        return true;
    }

    public function actionAbout($table_ads = "", $ads_id = 0)
    {
        $ads_id = (int)$ads_id;
        $this->testTable($table_ads);
        $this->testInteger($ads_id);

        require_once(ROOT . '/views/api/about_' . $table_ads . '.php');
        return true;
    }
}

