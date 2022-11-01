<?php 
    include '../data/bdConnect.php';

    $orderName=  $_POST['order_name'];
    $orderAmount =  $_POST['order_amount'];
    $orderEnd =  $_POST['order_end_date'];
    $orderStart =  $_POST['order_start_date'];

    $request = "INSERT INTO orders (order_name, order_amount, order_end_date, order_start_date) VALUES ('$orderName', '$orderAmount', '$orderEnd', '$orderStart')";
    mysqli_query($link, $request);

    header('Location: ../orders.php');
?>