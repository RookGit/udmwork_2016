<?php
$page = "jobs";
$db = Db::getConnection();
$query = $db->prepare("SELECT * FROM jobs WHERE id=:id and moder != 0 ");
$params = ['id' => $ads_id];
$query->execute($params);
$result = $query->fetch();


$query_plus = $db->prepare("SELECT * FROM jobs_about WHERE id=:id");
$query_plus->execute($params);
$result_plus = $query_plus->fetch();

if ($result == null or $result_plus == null) {

    ?>
    <script language="JavaScript">
        window.location.href = "/404"
    </script>
    <?php
    exit;
}

if (!isset($_COOKIE["Jobs$ads_id"])) {
    $query_2 = $db->prepare("UPDATE `jobs` SET `see` = `see` + 1 WHERE id=:id");
    $params_2 = ['id' => $ads_id];
    $query_2->execute($params_2);

    setcookie("Jobs$ads_id", "Jobs$ads_id", time() + 900);
}

$edited_value = Ads_check($result, "jobs");

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Просмотр вакансии | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU">
    <meta name="author" content="">
    <title>Вакансия | Работа, услуги в Ижевске и Удмуртской республике на UDMWORK.RU</title>
    <?php require_once(ROOT . '/components/Head_files.php'); ?>
    <script type="text/javascript" src="https://vk.com/js/api/share.js?93" charset="windows-1251"></script>
</head>

<body class='back_ads'>


<?php
require_once(ROOT . '/components/Header.php');
?>
<div class="container-fluid">

    <div class='window_about_ads'>
        <h1>Просмотр вакансии <?php echo "№" . $ads_id; ?></h1>


            <img class='pull-left image_about_ads' src='/template/images/category/<?=$result['type']?>.png' width='90' height='90'>

            <div class='window_about_ads_text_head'>Заголовок:</div>
            <div class='window_about_ads_text'><?=$result['header']?></div>

            <div class='window_about_ads_text_head'>Информация:</div>
            <div class='window_about_ads_text'><b>Зарплата:</b> <?=$edited_value['payment']?> <span class='br'> <b>Вакансия в:</b> <?=$edited_value['city']?></span> <span class='br'>
            <b>Просмотров:</b> <?=$result['see']?>
            <img class='eye_image' width='14' height='14' src='/template/images/eye.png'/></span>
            <span class='br'> <b>Сфера:</b> <?=$edited_value['type']?></span>
            </div>

            <div class='window_about_ads_text_head'>Описание:</div>
        <?php
        if ($result['moder'] == 8) {
            ?>

            <div class="suspicious_ads">ВНИМАНИЕ!!! ДАННОЕ ОБЪЯВЛЕНИЕ ПОМЕЧЕНО МОДЕРАТОРОМ САЙТА, КАК
                ПОДОЗРИТЕЛЬНОЕ!
            </div>
            <?php
        }
        ?>
            <div class='window_about_ads_text'><?=nl2br($result_plus['about'])?></div>

            <div class='window_about_ads_text_head'>Размещено:</div>
            <div class='window_about_ads_text'><?=date('d.m.Y H:i:s', $result['time'] + Config::get_data("plus_time") )?></div>

            <div class='window_about_ads_text_head'>Требуемый опыт работы:</div>
            <div class='window_about_ads_text'><?=$edited_value['exp']?></div>

            <div class='window_about_ads_text_head'>График работы:</div>
            <div class='window_about_ads_text'><?=$edited_value['graph']?></div>

            <div class='window_about_ads_text_head'>Требуемый пол:</div>
            <div class='window_about_ads_text'><?=$edited_value['gender']?></div>

            <div class='window_about_ads_text_head'>Как связаться?:</div>
        <?php

        if ($result_plus['telephone'] != null){
            ?>
            <div class='window_about_ads_text'>Телефон:<?=$result_plus['telephone']?></div>
            <?php
        }

        if ($result_plus['email'] != null){
        ?>

            <div class='window_about_ads_text'>Email: <?=$result_plus['email']?></div>
        <?php
        }
        ?>
        <center><script type='text/javascript'>
				document.write(VK.Share.button
				(
					{
						title: 'Вакансия в <?=$edited_value['city']?>: <?=$result['header']?> / Зарплата: <?=$edited_value['payment']?>',
						image: '<?= Config::get_data("img_link") ?>'
					},

					{
						type: 'round_nocount',
						text: 'Поделиться вакансией во Вконтакте'
					}
				)
				);
			</script></center>
    </div>

    <?php
    if ( isset($_SESSION['id']) )
        if($_SESSION['id'] == 1)
        require_once(ROOT . '/components/admin_menu.php');
    ?>

</div>


<?php require_once(ROOT . '/components/Footer.php'); ?>
</body>
</html>