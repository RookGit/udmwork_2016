<?php

function load_modules(Array $modules)
{
    $modules_path = [
        "fast_function" => "_fast_function",
        "admin_panel_link" => "_admin_panel_link",
    ];
    foreach ($modules as $item) {
        include_once (ROOT . '/components/modules/' . $modules_path[$item] .'/modul.php');
    }
}
