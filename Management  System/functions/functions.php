<?php 
    function сheckEmptyString($row, $strName, $bdRow) {
        if(!empty($_POST[$strName])) {
            $outStr = $_POST[$strName];
        }
        else {
            $outStr = $row[$bdRow];
        }
            return $outStr;
    }

    function avatarSecurity($avatar ) {
        $name = $avatar['name'];
        $type = $avatar['type'];
        $size = $avatar['size'];
        $blackList = array(".php", ".js", ".html");
        $tI = "." . end(explode("." , $name));
        foreach ($blackList as $row) {
            if( $tI == $row){
                return false;
            }
        }

        if($type != "image/png" && $type != "image/jpg" && $type != "image/jpeg" && $type != "image/bmp") {
            return false;
        }

        if($size > 10 * 1024 * 1024 ) {
            return false;
        }
        return true;
    }

    function loadAvatar ($avatar, $dirImage) {
        $type = $avatar['type'];
        $name = md5(microtime()) . '.' . substr($type, strlen("image/"));
        $dir = $_SERVER['DOCUMENT_ROOT'] . $dirImage;
        $uploadFile = $dir . $name; 
        if(move_uploaded_file($avatar['tmp_name'], $uploadFile)) {
            return true;
        }
        else {
            return false;
        }
    }

    function deleteTableRow ($tableName, $id, $link) {
        $request = "DELETE FROM {$tableName} WHERE id='$id'";
        mysqli_query($link, $request);
    }

    function fixDate($date) {
        return date("d.m.Y", strtotime($date));
    }
?>