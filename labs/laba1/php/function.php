<?php

function sr_main($arr_in, $g = false, $arguments = null)
{
    $g = ($g) ? 'display: inline-block;' : ''; 
    $arguments = ($arguments) ? '&arguments=' . $arguments : '';
    $s = "<ul>";
    foreach ($arr_in as $val) {
        $s .= "<li style='{$g} margin: 0 10px'><a href='{$_SERVER['SCRIPT_NAME']}?page={$val['page']}{$arguments}'>{$val['ru']}</a></li>";
    }
    $s .= "</ul>";
    return $s;
}

function toMain()
{
    header("Location:{$_SERVER['SCRIPT_NAME']}?page=main");
    exit;
}

function validateUrl($keys, $page, $arr)
{
    if (count($keys) >= 3) {
        toMain();
    }

    if (!array_key_exists($page, $arr)) {
        toMain();
    }

    foreach ($keys as $val) {
        $key = $val;
    }

    if (count($keys) == 1 && $key !== 'page') {
        toMain();
    } elseif (count($keys) >= 2 && $key !== 'arguments') {
        toMain();
    }
}