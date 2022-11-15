<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';

    $lastName =  $_POST['employee_last-name'];
    $firstName =  $_POST['employee_first-name'];
    $middleName =  $_POST['employee_middle-name'];
    $phone =  $_POST['employee_phone'];
    $post =  $_POST['employee_post'];
    $avatar = $_FILES['employee_avatar'];
    $speciality = $_POST['employee_speciality'];
    $dir = "/employee-avatars/";

    if(avatarSecurity($avatar)) {
        $img = addslashes(file_get_contents($avatar['tmp_name']));
        loadAvatar($avatar, $dir);
        $request = "INSERT INTO workers (worker_avatar, worker_last_name, worker_first_name, worker_middle_name, worker_phone, worker_status, worker_post, worker_speciality) VALUES ('$img', '$lastName', '$firstName', '$middleName', '$phone', 'Свободен', '$post', '$speciality')";
        mysqli_query($link, $request);
        echo mysqli_error($link);
    }
    header('Location: ../workers.php');
?>