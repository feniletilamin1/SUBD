<?php 
    include '../data/bdConnect.php';

    $objectId = $_GET['id'];
    $workerId = $_GET['workerId'];
    $request = "UPDATE workers SET worker_status='Занят' WHERE id='$workerId'";
    mysqli_query($link, $request);
    $request = "INSERT INTO object_workers (object_id, worker_id) VALUES ('$objectId', '$workerId')";
    mysqli_query($link, $request);

    header('Location: ../objectWorkers.php?id=' . $objectId);
?>