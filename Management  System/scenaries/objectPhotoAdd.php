<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';

    $photo = $_FILES['object_img'];
    $dir = "/object-photos/";
    $id = $_GET['id'];

    if(avatarSecurity($photo)) {
        $img = addslashes(file_get_contents($photo['tmp_name']));
        loadAvatar($photo, $dir);
        $request = "INSERT INTO object_photos (object_id, object_photo) VALUES ('$id', '$img')";
        mysqli_query($link, $request);
    }
    header("Location: ../objectsPhotos.php?id={$id}");
?>