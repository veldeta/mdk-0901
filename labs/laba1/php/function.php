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

function validateUrl($keys, $page, $arr, $ex)
{
    if (count($keys) >= 3) {
        toMain();
    }

    if (!array_key_exists($_GET['page'], $arr) || ($_GET['paramets'])
        ? (array_key_exists($page, $arr))
        ? !array_key_exists($_GET['page'], $arr[$page]['sub']) : true : '' || $_GET['page'] == $ex
    ) {
        toMain();
    }

    foreach ($keys as $val) {
        $key = $val;
        if ($key != 'page' && $key != 'paramets') {
            toMain();
        }
    }
}
