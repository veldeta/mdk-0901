<? 
require_once 'php/array.php';
require_once 'php/function.php';


$page = $_GET['arguments'] ?? $_GET['page'];

if ($page) {
    $keys = array_keys($_GET);
    
    validateUrl($keys, $page, $arr);
}

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа</title>
</head>

<body>
    <div>
            <h3>
                Электронный журнал <a style="text-decoration: none; color: black;" href="../index.html">РТК</a>
            </h3>
            <?= sr_main($arr, true); ?>
            
            <div style="display: flex;">
                <? 
                    if ($page && $arr[$page]['sub']) {
                        echo sr_main($arr[$page]['sub'], false, $page);
                    }
                ?>
            
                <?
                
                if ($_GET['arguments']) {
                    if (is_file("html/{$arr[$page]['sub'][$_GET['page']]['html']}")) {
                        include_once "html/{$arr[$page]['sub'][$_GET['page']]['html']}";
                    }
                } elseif ($_GET['page']) {
                    if (is_file("html/{$arr[$page]['html']}")) {
                        include_once "html/{$arr[$page]['html']}";
                    }
                }
                ?>
            </div>
    </div>
</body>
</html>
