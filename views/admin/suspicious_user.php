<?php
$db = Db::getConnection();

$params_3 = [
    'id' => $number
];

//Получаем id пользователя
$query_3 = $db->prepare("SELECT author FROM $table WHERE id = :id ;");
$query_3->execute($params_3);
$query_3->setFetchMode(PDO::FETCH_ASSOC);
$result = $query_3 -> fetch();
$author = $result[author];

//Обновляем данные пользователя:
$query_3 = $db->prepare("UPDATE users SET moder = 8, rest = 0 WHERE id = :id  ;");
$params_3 = [
    'id' => $author
];
$query_3->execute($params_3);

//Обновляем данные объявлений пользователя:
$query_3 = $db->prepare("UPDATE jobs SET moder = 8 WHERE author = :id AND moder != 6;");
$query_3->execute($params_3);

//Обновляем данные объявлений пользователя:
$query_3 = $db->prepare("UPDATE resume SET moder = 8 WHERE author = :id AND moder != 6;");
$query_3->execute($params_3);

//Обновляем данные объявлений пользователя:
$query_3 = $db->prepare("UPDATE services SET moder = 8 WHERE author = :id AND moder != 6;");
$query_3->execute($params_3);


echo "<br>Успешно";



?>