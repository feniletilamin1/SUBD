<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';

    $id = $_GET['id'];
    deleteTableRow('clients', $id, $link);
    header('Location: ../clients.php');
?>