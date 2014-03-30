<?php
function print_x($var, $decode = false){

    $return = print_r($var, true);

    if ($decode === true)

        $return = htmlspecialchars($return);

    $return = "<pre>{$return}</pre>";

    echo $return;

}
