<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';
    
    $id = $_GET['id'];
    $request = "SELECT * FROM clients WHERE id='$id'";
    $result = mysqli_query($link, $request);
    $row = mysqli_fetch_assoc($result);
    $avatar = $_FILES['client_avatar'];
    $dir = "/client-avatars/";
    
    if(avatarSecurity($avatar)) {
        $img = addslashes(file_get_contents($avatar['tmp_name']));
        $request = "UPDATE clients SET client_avatar='$img' WHERE id='$id'";
        mysqli_query($link,$request);
        loadAvatar($avatar, $dir);
    }

    $lastName = сheckEmptyString($row, 'client_last-name', 'client_last_name');
    $firstName = сheckEmptyString($row, 'client_first-name', 'client_first_name');
    $middleName = сheckEmptyString($row, 'client_middle-name', 'client_middle_name');
    $phone = сheckEmptyString($row, 'client_phone', 'client_phone');
    $post = сheckEmptyString($row, 'client_post', 'client_post');
    $request = "UPDATE clients SET client_last_name='$lastName', client_first_name='$firstName', client_middle_name='$middleName', client_phone='$phone'  WHERE id = '$id'";
    mysqli_query($link,$request);

    header('Location: ../clients.php');
?>