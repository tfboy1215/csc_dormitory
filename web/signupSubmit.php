<?php
include("conDB.php");
$u = $_POST['username'];
$p = $_POST['password'];
$n = $_POST['name'];
$ln = $_POST['last_name'];

$sql = "SELECT * FROM users WHERE username = '" . $u . "'";
$result = $conn->query($sql);
if ($result->num_rows <= 0) {
    $sql = "INSERT INTO users (username, pass, name, last_name, role) VALUE ('" . $u . "', '" . $p . "', '" . $n . "', '" . $ln . "', 3)";
    if ($conn->query($sql) === TRUE) {
        $sql = "SELECT * FROM users WHERE username = '" . $u . "'";
        $result = $conn->query($sql);
    } else {
        $url = null;
    }
}
$conn->close();

if ($result->num_rows > 0) {
    while ($getData = mysqli_fetch_assoc($result)) {
        if ($getData['username'] == $u && $getData['pass'] == $p) {
            session_start();
            $_SESSION["username"] = $getData['username'];
            $_SESSION["user_id"] = $getData['id'];
            $_SESSION["role"] = $getData['role'];
            $_SESSION["login"] = "Y";
            print_r($_SESSION);
            $url = "room.php";
        }
    }
}

if (!$url) {
    $url = 'signup.php?error=Y';
    session_unset();
    session_destroy();
}
header('Location: ' . $url);
