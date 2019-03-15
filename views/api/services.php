<div id="result">
    <?php
    require_once(ROOT . '/components/check_ads_post.php');

    $db = Db::getConnection();
    $query_1 = $db->prepare("SELECT COUNT(id) FROM services WHERE `moder` != 0 AND moder != 6 AND city LIKE :city AND time > :time AND type LIKE :type AND header LIKE :text");
    $params =
        [
            'city' => "%" . $city_params . "%",
            'type' => "%" . $type_params . "%",
            'text' => "%" . $search_params . "%",
            'time' => $passed_time,
        ];
    $query_1->execute($params);
    $result_1 = $query_1->fetchAll();

    $query_2 = $db->prepare("SELECT * FROM services WHERE moder != 0 AND moder != 6 AND city LIKE :city AND type LIKE :type AND time > :time AND header LIKE :text ORDER BY $sort_post DESC LIMIT " . ($page_now * 10 - 10) . ",10");
    $query_2->execute($params);
    $result_2 = $query_2->fetchAll();

    $query_3 = $db->prepare("SELECT * FROM services WHERE moder != 0 AND moder != 6 AND vip_time > 0 ORDER BY vip_time DESC LIMIT 0,2");
    $query_3->execute();
    $result_3 = $query_3->fetchAll();

    // VIP
    /*
        foreach ($result_3 as &$value) {
            $edited_value = Ads_check($value, "services");

            ?>
            <hr/><?= $value['id'] ?>/
            <br/><?= $value['type'] ?>/
            <br/><?= $value['header'] ?>/
            <br/>Услуга в: <?= $value['city'] ?>/
            <br/>Сфера: <?= mb_strtolower($edited_value['type'], 'UTF-8') ?>/
            <br/>Просмотров: <?= $value['see'] ?>/
            <br/>Оплата: <?= $edited_value['payment'] ?>/
            <br/>Размещено: <?= date('d.m.Y H:i:s', $value['time'] + Config::get_data("plus_time")) ?>/

            <?php
        }
    */

    echo "<hr/>".ceil($result_1[0]['COUNT(id)'] / 10)."/#@#/";

    foreach ($result_2 as &$value) {
        $edited_value = Ads_check($value, "services");
        ?>
        <br/><?= $value['id'] ?>/@#/
        <br/><?= $value['type'] ?>/@#/
        <br/><?= $value['color'] ?>/@#/
        <br/><?= $value['header'] ?>/@#/
        <br/>Услуга в: <?= $edited_value['city'] ?>/@#/

        <br/>Сфера: <?= mb_strtolower($edited_value['type'], 'UTF-8') ?>/@#/
        <br/>Просмотров: <?= $value['see'] ?>/@#/
        <br/>Оплата: <?= $edited_value['payment'] ?>/@#/
        <br/>Размещено: <?= date('d.m.Y H:i:s', $value['time'] + Config::get_data("plus_time")) ?>/#@#/

        <?php
    }

    if ($result_2 == null) {
        echo "null";
    }
    ?>

</div>
