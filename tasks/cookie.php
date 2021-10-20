<?php

$url = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if (strpos($url, '?') || $_SERVER['PATH_INFO']) {

    header("Location: " . $_SERVER['SCRIPT_NAME']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(strip_tags($_POST['name']));
    $age = trim(strip_tags($_POST['age']));
    $login = trim(strip_tags($_POST['login']));
    $psw = password_hash(trim(strip_tags($_POST['psw'])), PASSWORD_DEFAULT);

    if ($_POST['submit']) {
        setcookie('user_info', base64_encode(serialize(['name' => $name, 'age' => $age, 'login' => $login, 'psw' => $psw, 'count' => 1])), time()+3600*24*30);
    }
    
    if ($_POST['do_logout']) {
        setcookie('user_info', '', time()-3600);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (!$_COOKIE['user_info']) {
?>

<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
    <label>ФИО
        <input type="text" name="name" required>
    </label>
    <label>Возраст
        <input type="number" name="age" min="18" required>
    </label>
    <label>Логин
        <input type="text" name="login" required>
    </label>
    <label>Пароль
        <input type="password" name="psw" required>
    </label>
    <input type="submit" name="submit" value="Отправить">
</form>

<?
}
else {
    
    $user_info = unserialize(base64_decode($_COOKIE['user_info']));

    if ($user_info['count']) {
            $user_info['count'] += 1;
        }
        setcookie("user_info", base64_encode(serialize($user_info)), time()+3600*24*30);
    

?>

<p>Добро пожаловать, <? echo unserialize(base64_decode($_COOKIE['user_info']))['name']; ?></p>
<p>Вы зашли <? echo unserialize(base64_decode($_COOKIE['user_info']))['count'] ?> раз </p>
<form action="<? $_SERVER['PHP_SELF'] ?>" method="post">
<input type="submit" name="do_logout" value="Выход">
</form>
<?
}

?>
