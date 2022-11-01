<?php 
    include '../data/bdConnect.php';
    include '../functions/functions.php';

    $id = $_GET['photo-id'];
    $object_id = $_GET['object-id'];

    deleteTableRow('object_photos', $id, $link);
    header("Location: ../objectsPhotos.php?id={$object_id}");
?>