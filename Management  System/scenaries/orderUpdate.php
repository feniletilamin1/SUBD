<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';
    
    $id = $_GET['id'];
    $request = "SELECT * FROM orders WHERE id='$id'";
    $result = mysqli_query($link, $request);
    $row = mysqli_fetch_assoc($result);

    $orderName=  сheckEmptyString($row, 'order_name', 'order_name');
    $orderAmount =  сheckEmptyString($row, 'order_amount', 'order_amount');
    $orderEnd =  сheckEmptyString($row, 'order_end_date', 'order_end_date');
    $orderStart =  сheckEmptyString($row, 'order_start_date', 'order_start_date');

    $request = "UPDATE orders SET order_name='$orderName', order_amount='$orderAmount', order_end_date='$orderEnd', order_start_date='$orderStart'  WHERE id = '$id'";
    mysqli_query($link,$request);

    header('Location: ../orders.php');
?>