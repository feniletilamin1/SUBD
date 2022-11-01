<?php
    include '../data/bdConnect.php';
    $workerId = $_GET['workerId'];
    $objectId = $_GET['objectId'];
    $request = "DELETE FROM object_workers WHERE worker_id='$workerId' AND object_id='$objectId'";
    mysqli_query($link, $request);
    $request = "UPDATE workers SET worker_status = 'Свободен' WHERE id = '$workerId'";
    mysqli_query($link, $request);
    header('Location: ../objectWorkers.php?id=' . $objectId);
?>