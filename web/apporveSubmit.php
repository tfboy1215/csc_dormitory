<?php

include("conDB.php");

$id = $_POST['id'];

$sql = "UPDATE `dormitory` SET status = 'APPROVE' WHERE id = " . $id . "";
$conn->query($sql);
$conn->close();

$url = "room.php?mode=wait";

header('Location: ' . $url);
