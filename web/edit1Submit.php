<?php

include("conDB.php");

$id = $_POST['dormitory_id'];
$select = (int)$_POST['select'];

$file_up = "null.jpg";
$url = null;

if (($_FILES['my_file']['name'] != "")) {
    // Where the file is going to be stored
    $file = $_FILES['my_file']['name'];
    $path = pathinfo($file);
    $ext = $path['extension'];

    if ($ext == "jpg" || $ext == "jpeg" || $ext == "png" || $ext == "gif") {
        $target_dir = "../image/upload/";
        $filename = $path['filename'] . $uid;
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir . $filename . "." . $ext;

        // Check if file already exists
        if (file_exists($path_filename_ext)) {
            echo "Sorry, file already exists.";
        } else {
            move_uploaded_file($temp_name, $path_filename_ext);
            echo "Congratulations! File Uploaded Successfully.";
            $file_up = $filename . "." . $ext;
        }
    }
}

if ($select == 0) {
    $sql = "UPDATE `dormitory` SET image = '" . $file_up . "' WHERE id = " . $id;
    $conn->query($sql);
} elseif ($select > 0) {
    $sql = "UPDATE `image_detail` SET image_" . $select . " = '" . $file_up . "' WHERE dormitory_id = " . $id;
    $conn->query($sql);
}

$conn->close();

$url = "roomDetail.php?id=" . $id;

header('Location: ' . $url);
