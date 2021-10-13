<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answer = intval($_POST['answer']);
    $_SESSION['answer'] = $answer;

    if ($_SESSION['answer'] == $_SESSION['check']) {
        $_SESSION['res'] = 'true'; 
    } else {
        $_SESSION['res'] = 'false';
    }
    
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
} else {
    echo "Жулик, не воруй!";
    exit; 
}
?>