<?php
session_start();

$url = "$_SERVER[REQUEST_SCHEME]://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$_SESSION['main'] = $_SERVER['SCRIPT_NAME'];

if (strpos($url, '?') || $_SERVER['PATH_INFO']) {

    header("Location: " . $_SERVER['SCRIPT_NAME']);
    exit;
}

if (!$_SESSION['answer']) {

$n = rand(1, 10);
$check = 5 * $n;
$_SESSION['check'] = $check;

?>

<form action="check.php" method="POST">
    <label>n - число от 1 до 10
    <br>
    5 * n = ?
        <input name="answer" placeholder="Введите результат" min="5" max="50" type="number" required>
        <input name="submit" type="submit" value="Отправить">
</label>

<?
} else {   
            echo ($_SESSION['answer'] == $_SESSION['check']) ? "Вы угадали результат! =)" . "<br>" : "Вы неверно ответили =( Правильный ответ: " . $_SESSION['check'] . "<br>";
            echo "<a href=" . $_SERVER['PHP_SELF'] . "><button>Повторить</button></a>";
            unset($_SESSION['answer']);
            unset($_SESSION['check']);
}

?>