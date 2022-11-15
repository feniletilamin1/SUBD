<?php 
    include '../data/bdConnect.php';
    
    $workerId = $_GET['id'];
    $score =  $_POST['feedback_score'];
    $text =  $_POST['feedback_text'];
    $request = "INSERT INTO workers_feedbacks (worker_id, feedback_score, feedback_text) VALUES ('$workerId', '$score', '$text')";
    mysqli_query($link, $request);
    header('Location: ../workersFeedbacks.php?id=' . $workerId);
?>