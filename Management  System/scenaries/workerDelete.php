<?php
    include '../data/bdConnect.php';
    $id = $_GET['id'];
    $request = "DELETE FROM workers WHERE id='$id'";
    mysqli_query($link, $request);
    header('Location: ../workers.php');
?>