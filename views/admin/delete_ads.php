<?php
$db = Db::getConnection();
$users_table = "my_".$table;
$about_table = "about_".$table;

$params = [
    'id' => $number,
];

//Удаляем из данных пользователя
$query = $db->prepare("UPDATE users SET $users_table = $users_table - 1 WHERE id = (SELECT author FROM 
$table WHERE id = :id) ;");
$query->execute($params);

//Удаляем из основной таблицы
$query = $db->prepare("DELETE FROM $table WHERE id = :id ;");
$query->execute($params);

//Удаляем из второстепенной таблицы
$query = $db->prepare("DELETE FROM $about_table WHERE id = :id ;");
$query->execute($params);

echo "<br>Успешно";



?>