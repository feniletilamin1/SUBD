<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';

    $id = $_GET['id'];
    $workerId = $_GET['workerId'];
    deleteTableRow('workers_feedbacks', $id, $link);
    header('Location: ../workersFeedbacks.php?id=' . $workerId);
?>