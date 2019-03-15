<?php

function pre(Array $arr)
{
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}

function pre_serv()
{
    pre($_SERVER);
}
