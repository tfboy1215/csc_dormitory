<?php
include("conDB.php");
$u = $_POST['username'];
$p = $_POST['password'];


$result = $conn->query($sql);
$conn->close();
$url = "room.php?mode=my_room";

header('Location: ' . $url);
