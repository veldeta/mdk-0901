<?php

$arr = range(2, 9);

$url = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (isset($_GET['page'])) {
    if (!in_array($_GET['page'], $arr) || strpos($url, '&') || $_SERVER['PATH_INFO'] || strlen($_GET['page']) > 1) {

        header("Location: " . $_SERVER['SCRIPT_NAME']);
        exit;
    }
} elseif (strpos($url, '?') || $_SERVER['PATH_INFO']) {
    
    header("Location: " . $_SERVER['SCRIPT_NAME']);
    exit;
}

$page = $_GET['page'];

function getPage($x1, $x2)
{
    $arr = range(2, 9);
    echo "<div style='display: flex; flex-wrap:wrap; margin: 0 auto; width: 70%'>";
for ($i = $x1; $i <= $x2; $i++) {
    echo "<div style='margin: 20px'>";
    
    for ($k = 1; $k <= 10; $k++) {
        $res = $i * $k;
        $x = (in_array($i, $arr)) ? "<a href='{$_SERVER['PHP_SELF']}?page=".$i."'>{$i}</a>" : $i;
        $y = (in_array($k, $arr)) ? "<a href='{$_SERVER['PHP_SELF']}?page=".$k."'>{$k}</a>" : $k;
        $z = (in_array($res, $arr)) ? "<a href='{$_SERVER['PHP_SELF']}?page=".$res."'>{$res}</a>" : $res;

        echo $x . " x " . $y . " = " . $z;
        echo "<br/>";
        
    }
    echo "</div>";
    
}
echo "</div>";

}

if ($page) {
    getPage($page, $page);
    echo "<a href='{$_SERVER['PHP_SELF']}'><button>Вывести всё</button></a>";
} else {
    getPage($arr[0], $arr[count($arr)-1]);
}
?>