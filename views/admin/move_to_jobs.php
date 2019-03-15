<?php
$db = Db::getConnection();

//Берем данные из основной таблицы resume
$query = $db->prepare("SELECT * FROM resume WHERE id=:id and moder = 1 ");
$params = ['id' => $number];
$query -> execute($params);
$query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query -> fetch(); 

$edited_value = Ads_check($result, "resume");
?>
<hr>Заголовок: ".$result['header']?>
<br>Резюме в: <?$edited_value['city']?>
<br>Сфера: <?mb_strtolower($edited_value['type'], 'UTF-8')?>
<br>Пол: <?mb_strtolower($edited_value['gender'], 'UTF-8')?>
<br>Просмотров: <?=$result['see']?>
<br>Опыт работы в данной сфере: <?=mb_strtolower($edited_value['exp'], 'UTF-8')?>
<br>График: <?=mb_strtolower($edited_value['graph'], 'UTF-8')?>
<br>Зарплата: <?=$edited_value['payment']?>
<br>Размещено: <?=date('d.m.Y H:i:s',$result['time'] + 28800)?></div>


<?php


//Берем данные из about таблицы resume
$query_2 = $db->prepare("SELECT * FROM resume_about WHERE id=:id");
$params_2 = ['id' => $number];
$query_2 -> execute($params_2);
$query_2->setFetchMode(PDO::FETCH_ASSOC);
$result_2 = $query_2 -> fetch(); 





//Обновляем данные о количестве объявлений:
$query_3 = $db->prepare("UPDATE users SET my_resume = (my_resume - 1), my_jobs = (my_jobs + 1) WHERE id = :author_id;");
$params_3 = [
	'author_id' => $result['author']
];
$query_3 -> execute($params_3);   





// Добавляем в основную таблицу
$query_4 = $db->prepare("INSERT INTO `udmwork`.`jobs` "
		. "(`id`, `city`, `exp`, `author`, `header`, `moder`, `payment`, `time`, `vip_time`, `see`, `type`, `graph_gender`, `color`) VALUES "
		. "(NULL, :city, :exp, :id, :header, 1, :payment, :time, 0, 0, :type, :graph_gender, :color);");
$params_4 = [
	'id' => $result['author'],
	'city' => $result['city'],
	'exp' => 9,
	'header' => $result['header'],
	'payment' => $result['payment'],
	'time' => $result['time'],
	'type' => $result['type'],
	'graph_gender' => 43,
	'color' => "",
		];
$query_4 -> execute($params_4);    





// Берем id из основной таблицы
$query_5 = $db->prepare("SELECT id FROM jobs WHERE author=:id and header = :header and time = :time");
$params_5 = [
'id' => $result['author'],
'header' => $result['header'],
'time' => $result['time'],
];
$query_5 -> execute($params_5);
$query_5->setFetchMode(PDO::FETCH_ASSOC);
$result_5 = $query_5 -> fetch();

$this_ads_id = $result_5['id'];





// Добавление во вспомогательную таблицу
$query_6 = $db->prepare("INSERT INTO `udmwork`.`jobs_about` "
		. "(`id`, `about`, `telephone`, `email`) VALUES "
		. "(:id, :about, :number, :email);");
$params_6 = [
	'id' => $this_ads_id,
	'about' => $result_2['about'],
	'number' => $result_2['telephone'],
	'email' => $result_2['email'],
		];
$query_6 -> execute($params_6);




// Удаление из основной бд
$query_7 = $db->prepare("DELETE FROM resume
	WHERE id = :ads_id;");
$params_7 = [
	'ads_id' => $number
		];
$query_7 -> execute($params_7);





// Удаление из вспомогательной бд
$query_8 = $db->prepare("DELETE FROM resume_about
	WHERE id = :ads_id;");
$query_8 -> execute($params_7);
?>