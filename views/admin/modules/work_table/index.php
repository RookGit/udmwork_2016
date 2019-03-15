<?php

$db = Db::getConnection();

$result_count_users = $db->query("SELECT COUNT(id) AS count_all_users FROM users")->fetch();

$result_count_services = $db->query("SELECT COUNT(id) AS count_all_services FROM services")->fetch();
$result_count_vk = $db->query("SELECT COUNT(id) AS count_all_vk FROM users WHERE vk > 0 ")->fetch();
$result_count_jobs = $db->query("SELECT COUNT(id) AS count_all_jobs FROM jobs")->fetch();
$result_count_resume = $db->query("SELECT COUNT(id) AS count_all_resume FROM resume")->fetch();

echo "Всего зарегистрировано пользователей: <span class='badge'>".$result_count_users['count_all_users']."</span>";
echo "<br>Всего зарегистрировано пользователей на сайте: <span class='badge'>".($result_count_users['count_all_users'] - $result_count_vk['count_all_vk'])."</span>";
echo "<br>Всего зарегистрировано пользователей через ВКонтакте: <span class='badge'>".$result_count_vk['count_all_vk']."</span>";
echo "<br>Всего размещено вакансий: <span class='badge'>".$result_count_jobs['count_all_jobs']."</span>";
echo "<br>Всего размещено резюме: <span class='badge'>".$result_count_resume['count_all_resume']."</span>";
echo "<br>Всего размещено услуг: <span class='badge'>".$result_count_services['count_all_services']."</span>";