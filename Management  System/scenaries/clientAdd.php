<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';

    $lastName =  $_POST['client_last-name'];
    $firstName =  $_POST['client_first-name'];
    $middleName =  $_POST['client_middle-name'];
    $phone =  $_POST['client_phone'];
    $avatar = $_FILES['client_avatar'];
    $dir = "/client-avatars/";

    if(avatarSecurity($avatar)) {
        $img = addslashes(file_get_contents($avatar['tmp_name']));
        loadAvatar($avatar, $dir);
        $request = "INSERT INTO clients (client_avatar, client_last_name, client_first_name, client_middle_name, client_phone) VALUES ('$img', '$lastName', '$firstName', '$middleName', '$phone')";
        mysqli_query($link, $request);
    }
    
    header('Location: ../clients.php');
?>