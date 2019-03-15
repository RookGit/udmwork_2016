<?php
$db = Db::getConnection();

//Обновляем об объявлении объявлений:
$query_3 = $db->prepare("UPDATE $table SET moder = 8 WHERE id = :id;");
$params_3 = [
    'id' => $number,
];
$query_3->execute($params_3);
echo "<br>Успешно";



?>