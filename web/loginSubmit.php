<?php
include("conDB.php");
$u = $_POST['username'];
$p = $_POST['password'];

$sql = "SELECT username, pass FROM users WHERE username = '" . $u . "'";
$result = $conn->query($sql);
$conn->close();
$url = null;

while ($getData = mysqli_fetch_assoc($result)) {
    if ($getData['username'] == $u && $getData['pass'] == $p) {
        session_start();
        $_SESSION['username'] = $getData['username'];
        $url = "room.php";
    }
}
if (!$url) {
    $url = "login.php";
    session_unset();
    session_destroy();
}
header('Location: ' . $url);
