<?php

function get_corrected_post($string, $max_text = 1500, $delete_enter = false ) {
    $order = array("\r\n", "\n", "\r");
    
    $corrected_string = mb_strimwidth(htmlspecialchars($string), 0, $max_text, "");
    
    if($delete_enter == true)
    $corrected_string = str_replace($order, " ", $string);

    return trim($corrected_string);
}