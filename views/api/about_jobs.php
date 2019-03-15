<div id="result">
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

if ($result == null or $result_plus == null) echo "null";

$edited_value = Ads_check($result, "jobs");

?>


<?= $ads_id ?>/@#/<br/>
<?= $result['type'] ?>/@#/<br/>
    <?= $result['header'] ?>/@#/<br/>
    Зарплата: <?= $edited_value['payment'] ?>/@#/<br/>
    Вакансия в: <?= $edited_value['city'] ?>/@#/<br/>
    Просмотров: <?= $result['see'] ?>/@#/<br/>
    Сфера: <?= $edited_value['type'] ?>/@#/<br/>

<?php
/*
if ($result['moder'] == 8) {
    ?>

    <div class="suspicious_ads">ВНИМАНИЕ!!! ДАННОЕ ОБЪЯВЛЕНИЕ ПОМЕЧЕНО МОДЕРАТОРОМ САЙТА, КАК
        ПОДОЗРИТЕЛЬНОЕ!
    </div>
    <?php
}
*/
?>
<?= nl2br($result_plus['about']) ?>/@#/<br/>
    Размещено: <?= date('d.m.Y H:i:s', $result['time'] + Config::get_data("plus_time")) ?>/@#/<br/>
    Требуемый опыт работы: <?= $edited_value['exp'] ?>/@#/<br/>
    График работы: <?= $edited_value['graph'] ?>/@#/<br/>
    Требуемый пол: <?= $edited_value['gender'] ?>/@#/<br/>
<?php

if ($result_plus['telephone'] != null)
    echo "Телефон: " . $result_plus['telephone'];
else
    echo "Телефон: не указан";

echo "/@#/<br/>";

if ($result_plus['email'] != null) {
    echo "Email:" . $result_plus['email'];
} else
    echo "Email: не указан";

echo "/@#/<br/>";
?>

</div>
