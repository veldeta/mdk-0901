<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $answer = intval($_POST['answer']);
    $_SESSION['answer'] = $answer;
    
    header("Location: " . $_SESSION['main']);
    exit;
} else {
    echo "Жулик, не воруй!";
    exit; 
}
?>