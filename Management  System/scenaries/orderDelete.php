<?php
    include '../data/bdConnect.php';
    $id = $_GET['id'];
    $request = "DELETE FROM orders WHERE id='$id'";
    mysqli_query($link, $request);
    
    header('Location: ../orders.php');
?>