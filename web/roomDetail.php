<?php
include("header.php");
include("conDB.php");
?>

<body>
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">


                <!-- <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-secondary">แก้อะไรซักอย่าง</a></li>
                    
                </ul> -->
                <div class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <a href="room.php">
                        <i class="fa-solid fa-house" style="height: 50px;width: 50px; color:white;"></i>
                        <label for="head">
                            <h1 class="display-5" style="color:white;"> หอพัก CSC</h1>
                        </label>
                    </a>
                </div>

                <?php
                session_start();
                $login = "N";
                if ($_SESSION) {
                    $login = $_SESSION["login"];
                }
                if ($login == "Y") {
                ?>
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-white-600 small"><?php print($_SESSION["username"] . "&nbsp;") ?></span>
                            <img class="rounded-circle" src="../image/other/undraw_profile_3.svg" width="40px" height="40px">
                        </a>

                        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa-solid fa-address-card"></i>
                                    Profile
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                    Logout
                                </a>
                            </li>
                        <?php
                    } else {
                        session_unset();
                        session_destroy();
                        ?>
                            <div class="col-md-3 text-end">
                                <a href="login.php"><button type="button" class="btn btn-outline-primary me-2 bg-light">Login</button></a>
                                <button type="button" class="btn btn-primary">Sign-up</button>
                            </div>
                        <?php
                    }
                        ?>
            </div>
        </div>
    </header>
</body>

<?php include("footer.php"); ?>