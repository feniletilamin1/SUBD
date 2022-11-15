<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';

    $photo = $_FILES['object_img'];
    $dir = "/object-photos/";
    $id = $_GET['id'];
    $desc = $_POST['object_desc'];
    $date = date("Y/m/d");
    if(avatarSecurity($photo)) {
        $img = addslashes(file_get_contents($photo['tmp_name']));
        loadAvatar($photo, $dir);
        $request = "INSERT INTO object_photos (object_id, object_photo, photo_description, photo_date) VALUES ('$id', '$img', '$desc', '$date')";
        mysqli_query($link, $request);
    }
    header("Location: ../objectsPhotos.php?id={$id}");
?>