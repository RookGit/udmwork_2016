<?php

class Json
{
    public static function getJson($arr_params): String
    {

        switch ($arr_params["table"]) {
            case "jobs":
                break;

            case "resume":
                break;

            case "services":
                break;

            default:
                exit;
                break;
        }


        $city =
            [
                "izhevsk", "sarapul", "igra", "votkinsk", "mozhga", "cambarka", "other", "all", "all_city"
            ];

        if (!in_array($arr_params["city"], $city)) {
            exit;
        }


        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM " . $arr_params['table']);
        $result->setFetchMode(PDO::FETCH_NUM);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $res = $result->fetchAll();

        return json_encode($res);
    }
}
