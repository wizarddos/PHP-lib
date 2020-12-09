<?php
function uploadimg($target_dir,$name_file_to_upload){
    
    $target_file = $target_dir . basename($_FILES[$name_file_to_upload]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES[$name_file_to_upload]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES[$name_file_to_upload]["size"] > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    return false;
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES[$name_file_to_upload]["tmp_name"], $target_file)) {
        return true;
    } else {
        return false;
    }
    }
}