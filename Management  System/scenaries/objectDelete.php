<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';

    $id = $_GET['id'];
    deleteTableRow('objects', $id, $link);
    header('Location: ../objects.php');
?>