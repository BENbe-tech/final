<?php
session_start();


if(!empty($_GET['outc'])){
    $outc = $_GET['outc'];
    
    unset($_SESSION['registrationnumberc']);
    session_write_close();
    header('Location:index.php');
    exit;
}


if(!empty($_GET['outa'])){
    $outa = $_GET['outa'];
    
    unset($_SESSION['registrationnumbera']);
    session_write_close();
    header('Location:index.php');
    exit;
}

?>

