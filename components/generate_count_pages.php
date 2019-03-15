<?php
$max_page = $count = ceil($result_1[0]['COUNT(id)'] / 10); //Количество
if ($max_page > 0) {
    echo '<div class="page_field">                
                    <ul class="pagination">
                      <li><a href="/'.$page_type.'/' . $city_post . '/' . $time_post . '/' . $type_post . '/' . $sort_post . '/' . $search_post . '/1">&laquo;</a></li>';
    $i = 1;
    if ($page_now > 4) {
        $i = $page_now - 2;
        $plus = 2;
        if ($page_now + 2 > $count) {
            $plus = $count - $page_now;
            $i = $count - 4;
        }
        $count = $page_now + $plus;
    }

    if ($count - $i > 5) {
        $count = $i + 4;
    }

    while ($i <= $count) {
        if ($page_now == $i) {
            echo '<li class="active_page" ><a href="/'.$page_type.'/' . $city_post . '/' . $time_post . '/' . $type_post . '/' . $sort_post . '/' . $search_post . '/' . $i . '"><ins>' . $i . '</ins></a></li>';
        } else {
            echo '<li><a href="/'.$page_type.'/' . $city_post . '/' . $time_post . '/' . $type_post . '/' . $sort_post . '/' . $search_post . '/' . $i . '">' . $i . '</a></li>';
        }
        $i++;
    }

    echo '<li><a href="/'.$page_type.'/' . $city_post . '/' . $time_post . '/' . $type_post . '/' . $sort_post . '/' . $search_post . '/' . $max_page . '">&raquo;</a></li>
                    </ul>
                </div>';
}