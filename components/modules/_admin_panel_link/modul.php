<?php

function create_link(String $rout)
{
    $route  = explode("/", $_SERVER["REQUEST_URI"]);
    echo "/".$route[1]."/".$rout;
}