<?php

$db = Db::getConnection();

$query = $db->query("SELECT * FROM users");

$result = $query->fetchAll();

echo "<pre>";
foreach ($result as $data) {

   echo $pass = md5($data["pass"]);
   echo "<br>";
    $id = $data["id"];
    $query = $db->query();

    $query_1 = $db->prepare(" UPDATE users SET pass = :pass WHERE id = :id ");
    $params =
        [
            'id' => $id,
            'pass' => $pass
        ];
    $query_1->execute($params);
}



