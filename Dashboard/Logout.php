<?php 
    include '../Model/Db.php';

    session_start();
    $db = new db();
    $db->closeConnection();
    session_destroy();
    header('Location: ../Dashboard/login.php');
    exit;
?>