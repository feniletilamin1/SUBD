<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';
    
    $id = $_GET['id'];
    $request = "SELECT * FROM objects WHERE id='$id'";
    $result = mysqli_query($link, $request);
    $row = mysqli_fetch_assoc($result);
    

    $name = сheckEmptyString($row, 'object_name', 'object_name');
    $category = сheckEmptyString($row, 'object_category', 'object_category');
    $amount = сheckEmptyString($row, 'object_amount', 'object_amount');
    $phone = сheckEmptyString($row, 'object_phone', 'object_phone');
    $index = сheckEmptyString($row, 'object_index', 'object_index');
    $region = сheckEmptyString($row, 'object_region', 'object_region');
    $city = сheckEmptyString($row, 'object_city', 'object_city');
    $street = сheckEmptyString($row, 'object_street', 'object_street');
    $home = сheckEmptyString($row, 'object_home', 'object_home');
    $status = сheckEmptyString($row, 'object_status', 'object_status');
    $request = "UPDATE objects SET object_name='$name', object_category='$category', object_amount='$amount', object_status='$status', object_phone='$phone', object_index='$index', object_region='$region', object_city='$city', object_street='$street', object_home='$home' WHERE id = '$id'";
    mysqli_query($link,$request);

    header('Location: ../objects.php');
?>