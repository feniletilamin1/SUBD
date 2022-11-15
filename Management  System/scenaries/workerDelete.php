<?php
    include '../data/bdConnect.php';
    $id = $_GET['id'];
    $request = "UPDATE workers SET worker_status = 'Уволен' WHERE id='$id'";
    mysqli_query($link, $request);
    header('Location: ../workers.php');
?>