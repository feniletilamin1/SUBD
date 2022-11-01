<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';
    
    $id = $_GET['id'];
    $request = "SELECT * FROM workers WHERE id='$id'";
    $result = mysqli_query($link, $request);
    $row = mysqli_fetch_assoc($result);
    $avatar = $_FILES['employee_avatar'];
    $dir = "/employee-avatars/";
    
    if(avatarSecurity($avatar)) {
        $img = addslashes(file_get_contents($avatar['tmp_name']));
        $request = "UPDATE workers SET worker_avatar='$img' WHERE id='$id'";
        mysqli_query($link,$request);
        loadAvatar($avatar, $dir);
    }

    $lastName = сheckEmptyString($row, 'employee_last-name', 'worker_last_name');
    $firstName = сheckEmptyString($row, 'employee_first-name', 'worker_first_name');
    $middleName = сheckEmptyString($row, 'employee_middle-name', 'worker_middle_name');
    $phone = сheckEmptyString($row, 'employee_phone', 'worker_phone');
    $post = сheckEmptyString($row, 'employee_post', 'worker_post');
    $request = "UPDATE workers SET worker_last_name='$lastName', worker_first_name='$firstName', worker_middle_name='$middleName', worker_phone='$phone', worker_post='$post'  WHERE id = '$id'";
    mysqli_query($link,$request);

    header('Location: ../workers.php');
?>