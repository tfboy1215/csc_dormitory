<?php

include("conDB.php");

$id = $_POST['id'];

$sql = "DELETE FROM `dormitory` WHERE id = " . $id . "";
$conn->query($sql);
$sql = "DELETE FROM `dormitory_detail` WHERE dormitory_id = " . $id . "";
$conn->query($sql);
$sql = "DELETE FROM `image_detail` WHERE dormitory_id = " . $id . "";
$conn->query($sql);
$conn->close();

$url = "room.php";

header('Location: ' . $url);
