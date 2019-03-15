<?php
$db = Db::getConnection();
$query = $db->prepare("SELECT * FROM users WHERE id=:id ");
$params = ['id' => $_SESSION['id']];
$query->execute($params);
$query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query->fetch();