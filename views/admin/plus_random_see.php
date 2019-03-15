<?php
$db = Db::getConnection();

//Берем максимальный id
$query = $db->prepare("SELECT MAX(id) FROM $table");
$query -> execute();
$query->setFetchMode(PDO::FETCH_ASSOC);
$result = $query -> fetch(); 

$max_id = $result['MAX(id)'];

$i = 1;
while($max_id+1 > $i)
{
	
//Обновляем данные о количестве объявлений:
$query_3 = $db->prepare("UPDATE $table SET see = (see + :plus_see) WHERE id = :id;");
$params_3 = [
	'id' => $i,
	'plus_see' => ceil((rand(1,5)))
];
$query_3 -> execute($params_3);  
echo "<br>Успешно: $i";
$i++;
}


 



?>