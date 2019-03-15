<?php
if (isset($_POST['type_post'])) $type_post = $_POST['type_post'];
if (isset($_POST['city_post'])) $city_post = $_POST['city_post'];
if (isset($_POST['time_post'])) $time_post = $_POST['time_post'];
if (isset($_POST['sort_post'])) $sort_post = $_POST['sort_post'];
if (isset($_POST['search_post'])) $search_post = $_POST['search_post'];

switch ($sort_post) {
    case "time":
        break;
    case "payment":
        break;
    case "see":
        break;
    default:
        $sort_post = "time";
}


$passed_time = time() - (int)$time_post * 86400;


$search_post = urldecode($search_post);
if ($city_post == "all_city") $city_params = "";
else {
    $city_params = $city_post;
}

if ($time_post == "all_time") $passed_time = 0;

if ($type_post == "all_type") $type_params = "";
else {
    $type_params = $type_post;
}

if ($search_post == "all_search") $search_params = "";
else {
    $search_params = $search_post;
}

?>