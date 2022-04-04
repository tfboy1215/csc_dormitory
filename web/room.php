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
                            <img class="rounded-circle" src="../image/other/undraw_profile.svg" width="40px" height="40px">
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


    <div class="room">
        <?php
        if ($_SESSION) {
            print('<div>');
            print('<button type="button" id="selectModeBt" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#selectMode"><i class="fa-solid fa-arrow-down-wide-short" style="height: 18px;width: 18px;"></i> Select </button>');
            print('</div>');
        } else {
            print('<br>');
        }
        ?>
        <hr>
        <table id="datatable" class="table table-hover word-next-line" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>หอ</th>
                    <th>ราคา</th>
                    <th>รายระเอียด</th>
                    <th>ที่อยู่</th>
                    <th>contact</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `dormitory` WHERE `status` != 'WAIT_APPROVE'";
                if ($_SESSION) {
                    $getMode = null;
                    if ($_GET) {
                        $getMode = $_GET['mode'];
                    }
                    if ($getMode == "my_room") {
                        $sql = "SELECT * FROM `dormitory` WHERE `user_id` = " . $_SESSION['user_id'];
                    } elseif ($getMode == "wait") {
                        $sql = "SELECT * FROM `dormitory` WHERE `status` = 'WAIT_APPROVE'";
                    } else {
                        $sql = "SELECT * FROM `dormitory` WHERE `status` != 'WAIT_APPROVE'";
                    }
                }
                $result = $conn->query($sql);
                $conn->close();
                if ($result) {
                    $row = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        print('<tr>');
                        print('<td>');
                        print('<div style="height: 80px;width: 170px;px;">');
                        $img = '<img src="../image/' . $row['image'] . '" alt="home" style="height: 80px;width: 170px;px;">';
                        print($img);
                        print('</div>');
                        print('</td>');
                        print('<td>');
                        print('<div>');
                        print($row['dormitory_room']);
                        print('</div>');
                        print('</td>');
                        print('<td>');
                        print('<div>');
                        print($row['price']);
                        print('</div>');
                        print('</td>');
                        print('<td>');
                        print('<div class = "word-next-line">');
                        print($row['desscription']);
                        print('</div>');
                        print('</td>');
                        print('<td>');
                        print('<div "word-next-line">   ');
                        // print('<a href="'.$row['address'].'">คลืกนี้</a>');
                        print($row['address']);
                        print('</div>');
                        print('</td>');
                        print('<td>');
                        print('<div>');
                        print($row['contact']);
                        print('</div>');
                        print('</td>');
                        print('<td>');
                        if ($_SESSION) {
                            if ((int)$_SESSION['role'] <= 2 && $row['status'] == "WAIT_APPROVE") {
                                $obj = json_encode($row);
                ?>
                                <button type="button" name='<?php echo $obj ?>' id="approveBt" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approve""><i class=" fa-solid fa-check" style="height: 20px;width: 20px;"></i></button>
                            <?php
                            }
                            if ((int)$_SESSION['role'] <= 2) {
                                $obj = json_encode($row);
                            ?>
                                <button type="button" name='<?php echo $obj ?>' id="deleteBt" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteDom"><i class=" fa-solid fa-x" style="height: 20px;width: 20px;"></i></button>
                <?php
                            }
                        }
                        print('<a href="roomDetail.php" target="_blank"><button type="button" class="btn btn-info btn-sm"><i class="fa-regular fa-circle-info" style="height: 20px;width: 20px;"></i></button></a>');
                        print('</td>');
                        print('</tr>');
                    }
                }
                ?>
            </tbody>
        </table>
        <script src="../node_modules/jquery/dist/jquery.js"></script>
        <script src="../node_modules/@popperjs/core/dist/umd/popper-base.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="../node_modules/datatables.net/js/jquery.dataTables.js"></script>
        <script src="../node_modules/@fortawesome/fontawesome-free/js/all.js"></script>
        <script src="room.js"></script>
    </div>
    </div>


</body>

<div class="modal fade" id="selectMode" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-deleteLot" action="" method="get">
                <div class="modal-header">
                    <h4 class="modal-title">Search</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <?php
                        if ($_SESSION) {
                            if ((int)$_SESSION['role'] <= 2) {
                        ?>
                                <select name="mode" id="mode" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    <option value="all">All room</option>
                                    <option value="my_room">My room</option>
                                    <option value="wait">WAIT APPROVE</option>
                                </select>
                            <?php
                            } else {
                            ?>
                                <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                    <option value="all">All room</option>
                                    <option value="my_room">My room</option>
                                </select>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Search</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="approve" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-deleteLot" action="apporveSubmit.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Approve</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="dormitoryId" name="id">
                        <label for="approve">คุณต้องการอนุมัติ หอ: <span id="room_name">xxx</span></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteDom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-deleteLot" action="deleteSubmit.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="deleteDormitoryId" name="id">
                        <label for="delete">คุณต้องการลบ หอ: <span id="roomNameDelete">xxx</span></label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Yes</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php include("footer.php"); ?>