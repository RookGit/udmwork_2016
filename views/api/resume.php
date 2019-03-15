<div id="result">
    <?php
    require_once(ROOT . '/components/check_ads_post.php');

    $db = Db::getConnection();
    $query_1 = $db->prepare("SELECT COUNT(id) FROM `resume` WHERE `moder` != 0 AND moder != 6 AND city LIKE :city AND time > :time AND type LIKE :type AND header LIKE :text");
    $params =
        [
            'city' => "%" . $city_params . "%",
            'type' => "%" . $type_params . "%",
            'text' => "%" . $search_params . "%",
            'time' => $passed_time,
        ];
    $query_1->execute($params);
    $result_1 = $query_1->fetchAll();

    $query_2 = $db->prepare("SELECT * FROM resume WHERE moder != 0 AND moder != 6 AND city LIKE :city AND type LIKE :type AND time > :time AND header LIKE :text ORDER BY $sort_post DESC LIMIT " . ($page_now * 10 - 10) . ",10");
    $query_2->execute($params);
    $result_2 = $query_2->fetchAll();

    $query_3 = $db->prepare("SELECT * FROM resume WHERE moder != 0 AND moder != 6 AND vip_time > 0 ORDER BY vip_time DESC LIMIT 0,2");
    $query_3->execute();
    $result_3 = $query_3->fetchAll();

    // VIP
    /*
        foreach ($result_3 as &$value) {
            $edited_value = Ads_check($value, "resume");
            ?>

            <br/><?= $value['id'] ?>/
            <br/><?= $value['type'] ?>/
            <br/><?= $value['header'] ?>/
            <br/>Резюме в: <?= $value['city'] ?>/
            <br/>Сфера: <?= mb_strtolower($edited_value['type'], 'UTF-8') ?>/
            <br/>Пол: <?= mb_strtolower($edited_value['gender'], 'UTF-8') ?>/
            <br/>Просмотров: <?= $value['see'] ?>/
            <br/>Опыт работы: <?= mb_strtolower($edited_value['exp'], 'UTF-8') ?>/
            <br/>График: <?= mb_strtolower($edited_value['graph'], 'UTF-8') ?>/
            <br/>Зарплата: <?= $edited_value['payment'] ?>/
            <br/>Размещено: <?= date('d.m.Y H:i:s', $value['time'] + Config::get_data("plus_time")) ?>/

            <?php
        }
    */

    echo "<hr/>".ceil($result_1[0]['COUNT(id)'] / 10)."/#@#/";

    foreach ($result_2 as &$value) {
        $edited_value = Ads_check($value, "resume");
        ?>
        <br/><?= $value['id'] ?>/@#/
        <br/><?= $value['type'] ?>/@#/
        <br/><?= $value['сщдщк'] ?>/@#/
        <br/><?= $value['header'] ?>/@#/
        <br/>Резюме в: <?= $value['city'] ?>/@#/
        <br/>Сфера: <?= mb_strtolower($edited_value['type'], 'UTF-8') ?>/@#/
        <br/>Пол: <?= mb_strtolower($edited_value['gender'], 'UTF-8') ?>/@#/
        <br/>Просмотров: <?= $value['see'] ?>/@#/
        <br/>Опыт работы: <?= mb_strtolower($edited_value['exp'], 'UTF-8') ?>/@#/
        <br/>График: <?= mb_strtolower($edited_value['graph'], 'UTF-8') ?>/@#/
        <br/>Зарплата: <?= $edited_value['payment'] ?>/@#/
        <br/>Размещено: <?= date('d.m.Y H:i:s', $value['time'] + Config::get_data("plus_time")) ?>/#@#/

        <?php
    }

    if ($result_2 == null) {
        echo "null";
    }
    ?>
</div>
