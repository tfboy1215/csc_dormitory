<?php

include("conDB.php");
$uid = $_POST['user_id'];
$n = $_POST['name'];
$p = $_POST['price'];
$d = $_POST['desscription'];
$a = $_POST['address'];
$c = $_POST['contact'];
$r = $_POST['role'];

if ((int)$r <= 2) {
    $status = "APPROVE";
} else {
    $status = "WAIT_APPROVE";
}

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

$sql = "INSERT INTO dormitory (user_id, dormitory_room, price, desscription, address, contact, status, image) VALUE (" . $uid . ", '" . $n . "', '" . $p . "', '" . $d . "', '" . $a . "', '" . $c . "', '" . $status . "',  '" . $file_up . "')";
// $sql = "INSERT INTO users (user_id) VALUE (' . $uid . ')"; 

if ($conn->query($sql) === TRUE) {
    $get_id = $conn->insert_id;
    $sql = "INSERT INTO dormitory_detail (dormitory_id) VALUE (".$get_id.")";
    $conn->query($sql);
    $sql = "INSERT INTO image_detail (dormitory_id) VALUE (".$get_id.")";
    $conn->query($sql);
    $url = "room.php?mode=my_room";
} else {
    $url = null;
}

$conn->close();


header('Location: ' . $url);
