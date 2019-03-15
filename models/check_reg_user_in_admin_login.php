<?php

$db = Db::getConnection();
$query = $db->prepare("SELECT id FROM admin_users WHERE login=:login and password=:password ");
$params = ['login' => $_REQUEST['login'], 'password' => md5($_REQUEST['password'])];
$query->execute($params);
$result = $query->fetch();

if (isset($result['id'])) {
    $_SESSION['admin_id'] = $result['id'];
    header("Location: /".Config::get_data("admin_token_prefix")."_admin_panel_main");
}