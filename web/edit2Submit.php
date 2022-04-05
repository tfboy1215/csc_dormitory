<?php

include("conDB.php");

$id = $_POST['dormitory_id'];
$name = $_POST['name'];
$price = $_POST['price'];
$desscription = $_POST['desscription'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$other = $_POST['other'];
$map = $_POST['map'];
$facebook = $_POST['facebook'];
$line = $_POST['line'];
$ig = $_POST['ig'];


$file_up = "null.jpg";

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
            $file_up = $filename . "." . $ext;
        } else {
            move_uploaded_file($temp_name, $path_filename_ext);
            echo "Congratulations! File Uploaded Successfully.";
            $file_up = $filename . "." . $ext;
        }
    }
}

if ($file_up != "null.jpg") {
    $sql = "UPDATE `image_detail` SET image_6 = '" . $file_up . "' WHERE dormitory_id = " . $id;
    $conn->query($sql);
}
$sql = "UPDATE `dormitory` SET dormitory_room = '" . $name . "', price = " . $price . ", desscription = '" . $desscription . "', address = '" . $address . "',contact = '" . $contact . "'  WHERE id = " . $id;
$conn->query($sql);
$sql = "UPDATE dormitory_detail SET other='" . $other . "', map = '" . $map . "', line = '" . $line . "', facebook = '" . $facebook . "', ig = '" . $ig . "' WHERE  dormitory_id =" . $id;
$conn->query($sql);
$conn->close();

$url = "roomDetail.php?id=" . $id;

header('Location: ' . $url);
