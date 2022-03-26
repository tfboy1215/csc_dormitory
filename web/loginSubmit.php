<?php
    include("conDB.php");
    $u = $_POST['username'];
    $p = $_POST['password'];

    $sql = "SELECT username, pass FROM users WHERE username = '".$u."'";
    $result = $conn->query($sql);
    if($result){
        while ($getData = mysqli_fetch_assoc($result)) {
            if($getData['username'] == $u && $getData['pass'] == $p){
                print("Login success");
            }else{
                print("Login fail");
            }
        }
    }else{
        print("con error");
    }
    $conn->close();
?>
