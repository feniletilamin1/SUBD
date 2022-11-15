<?php 
    include '../data/bdConnect.php';
    
    $id = $_GET['id'];
    $request = "UPDATE objects SET object_status='Завершён' WHERE id = '$id'";
    mysqli_query($link,$request);

    $request = "SELECT worker_id FROM object_workers WHERE object_id = '$id'";
    $result = mysqli_query($link,$request);

    while($row = mysqli_fetch_assoc($result)) {
        $workerId = $row['worker_id'];
        $request = "UPDATE workers SET worker_status='Свободен' WHERE id='$workerId' AND worker_status = 'Занят'";
        mysqli_query($link, $request);
    }

    header('Location: ../objects.php');
?>