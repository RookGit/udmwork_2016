<?php
$db = Db::getConnection();
$query_1 = $db->prepare("SELECT COUNT(id) FROM `resume` WHERE `moder` != 0 AND moder != 6 AND city LIKE :city AND time > :time AND type LIKE :type AND header LIKE :text");
$params =
    [
        'city' => "%" . $city_params . "%",
        'type' => "%" . $type_params . "%",
        'text' => "%" . $search_params . "%",
        'time' => $passed_time,
    ];
$query_1->execute($params);
$result_1 = $query_1->fetchAll();

$query_2 = $db->prepare("SELECT * FROM resume WHERE moder != 0 AND moder != 6 AND city LIKE :city AND type LIKE :type AND time > :time AND header LIKE :text ORDER BY $sort_post DESC LIMIT " . ($page_now * 10 - 10) . ",10");
$query_2->execute($params);
$result_2 = $query_2->fetchAll();

$query_3 = $db->prepare("SELECT * FROM resume WHERE moder != 0 AND moder != 6 AND vip_time > 0 ORDER BY vip_time DESC LIMIT 0,2");
$query_3->execute();
$result_3 = $query_3->fetchAll();