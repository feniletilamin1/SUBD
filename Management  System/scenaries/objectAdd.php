<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';
    
    $foreManId = $_POST['object_foreman'];
    $name = $_POST['object_name'];
    $category = $_POST['object_category'];
    $amount = $_POST['object_amount'];
    $phone = $_POST['object_phone'];
    $index = $_POST['object_index'];
    $region = $_POST['object_region'];
    $city = $_POST['object_city'];
    $street = $_POST['object_street'];
    $home = $_POST['object_home'];
    $owner = $_POST['object_owner'];

    $request = "INSERT INTO objects (object_name, object_category, object_amount, object_phone, object_index, object_region, object_city, object_street, object_home, object_status, object_owner) VALUES ('$name', '$category', '$amount', '$phone', '$index', '$region', '$city', '$street', '$home', 'В работе', '$owner')";
    mysqli_query($link, $request);

    $request = "SELECT id FROM objects WHERE object_name='$name'";
    $result = mysqli_query($link, $request);
    $row = mysqli_fetch_array($result);
    $objectId = $row['id'];

    $request = "INSERT INTO object_workers (object_id, worker_id) VALUES ('$objectId','$foreManId')";
    mysqli_query($link, $request);

    $request = "UPDATE workers SET worker_status = 'Занят' WHERE id='$foreManId'";
    mysqli_query($link, $request);
    header('Location: ../objects.php');
?>