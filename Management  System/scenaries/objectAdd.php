<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';
    
    $name = $_POST['object_name'];
    $category = $_POST['object_category'];
    $amount = $_POST['object_amount'];
    $phone = $_POST['object_phone'];
    $index = $_POST['object_index'];
    $region = $_POST['object_region'];
    $city = $_POST['object_city'];
    $street = $_POST['object_street'];
    $home = $_POST['object_home'];


    $request = "INSERT INTO objects (object_name, object_category, object_amount, object_phone, object_index, object_region, object_city, object_street, object_home, object_status) VALUES ('$name', '$category', '$amount', '$phone', '$index', '$region', '$city', '$street', '$home', 'В работе')";
    mysqli_query($link, $request);
    header('Location: ../objects.php');
?>