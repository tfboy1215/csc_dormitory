<?php

include("conDB.php");

$id = $_POST['id'];

$sql = "DELETE FROM `dormitory` WHERE id = " . $id . "";
$conn->query($sql);
$conn->close();

$url = "room.php";

header('Location: ' . $url);
