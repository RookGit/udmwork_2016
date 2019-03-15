
<?php
// $name_get = $vk_arr['response'][0]['first_name'];
// $surname_get = $vk_arr['response'][0]['last_name'];

$api_id_my = 6167437;
$api_secret = "WoNIlCW6FEVzHPC5MWHC";
$vk_arr = json_decode($_GET['api_result'], true);


$user_id_get = $vk_arr['response'][0]['uid'];
$user_id_get_2 = $_GET['viewer_id']; 
$api_id_get = $_GET['api_id']; 
$auth_key_get = $_GET['auth_key']; // Входящий auth_key

$auth_key_my = md5($api_id_my.'_'.$user_id_get_2.'_'.$api_secret);

if($auth_key_get == $auth_key_my) {

	$db = Db::getConnection();
	
	$query = $db->prepare("SELECT * FROM vk WHERE auth=:auth and idVk = :id_vk ");
	$params = [
	'auth' => $auth_key_my,
	'id_vk' => $user_id_get
	];
	$query -> execute($params);
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$result = $query -> fetch();


	if($result['id'] != null)
	{
		if(isset($_GET['api_url'])) setcookie("login_vk", "login_vk", time()+3600);
		
		$query_2 = $db->prepare("SELECT id FROM users WHERE vk=:vk_id ");
		$params_2 = ['vk_id' => $user_id_get];
		$query_2 -> execute($params_2);
		$query_2->setFetchMode(PDO::FETCH_ASSOC);
		$result_2 = $query_2 -> fetch();

        $_SESSION['id'] = $result_2['id'];
		header('Location: /my_cabinet/resume/1');
		exit;
	}
	else
	{
		
		// Добавляем данные о пользователе в таблицу users
		$query_3 = $db->prepare("INSERT INTO `udmwork`.`users` "
			. "(`id`, `email`, `pass`, `timebonus`, `GenVerAge`, `moder`, `balance`, `rest`, `vk`, `my_resume`, `my_jobs`, `my_services`) VALUES "
			. "(NULL, NULL, NULL, ".time().", 31, 1, 25, 3, :vk_id, 0, 0, 0);");

		$params_3 = ['vk_id' => $user_id_get];
		$query_3 -> execute($params_3);
		
		
		// Добавляем данные о пользователе в таблицу VK
		$query_2 = $db->prepare("INSERT INTO `vk` "
		. "(`id`, `idVk`, `auth`) VALUES "
		. "(NULL, :id_vk, :auth);");
		$query_2 -> execute($params);
		
		
		// Берем ID из таблицы
		$query_2 = $db->prepare("SELECT id FROM users WHERE vk=:vk_id ");
		$params_2 = ['vk_id' => $user_id_get];
		$query_2 -> execute($params_2);
		$query_2->setFetchMode(PDO::FETCH_ASSOC);
		$result_2 = $query_2 -> fetch();

        $_SESSION['id'] = $result_2['id'];
		header('Location: /my_cabinet/resume/1');
		exit;
		
		
	}
}
?>
