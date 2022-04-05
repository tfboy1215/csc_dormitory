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

    <section>
        <div class="detail">
            <?php
            if ($_GET) {
                $domId = $_GET['id'];
                $sql = "SELECT dormitory_detail.dormitory_id, map, other, line, facebook, ig, image_1, image_2, image_3, image_4, image_5,image_6, dormitory_room, price, user_id, desscription, image, address, contact FROM dormitory_detail INNER JOIN image_detail ON dormitory_detail.dormitory_id = image_detail.dormitory_id  INNER JOIN dormitory ON dormitory_detail.dormitory_id = dormitory.id  where dormitory_detail.dormitory_id = " . $domId;
                // $sql = "SELECT dormitory_detail.dormitory_id, map, other, line, facebook, ig FROM dormitory_detail INNER JOIN";
                $result = $conn->query($sql);
                $conn->close();
                $row = [];
                if ($result) {
                    while ($getData = mysqli_fetch_assoc($result)) {
                        array_push($row, $getData);
                    }
                }
            }
            ?>
            <div class="d-flex justify-content-center room">
                <div>
                    <h1><?php echo $row[0]['dormitory_room'] ?></h1>
                </div>
            </div>
            <?php
            if ($_SESSION) { ?>
                <div class="d-flex justify-content-center room">
                    <div style="margin: auto;">
                        <?php
                        if ($_SESSION['user_id'] == $row[0]['user_id']) {
                        ?>
                            <button type="button" id="editBt" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#edit1"><i class="fa-solid fa-screwdriver-wrench" style="height: 18px;width: 18px;"></i> Edit 1 </button>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            <?php
            }
            ?>
            <div class="d-flex justify-content-center room">
                <div>
                    <img class="size" src="../image/upload/<?php echo $row[0]['image'] ?>" alt="image1">
                    <img class="size" src="../image/upload/<?php echo $row[0]['image_1'] ?>" alt="image2">
                    <img class="size" src="../image/upload/<?php echo $row[0]['image_2'] ?>" alt="image3">
                </div>
            </div>
            <div class="d-flex justify-content-center room">
                <div>
                    <img class="size" src="../image/upload/<?php echo $row[0]['image_3'] ?>" alt="image4">
                    <img class="size" src="../image/upload/<?php echo $row[0]['image_4'] ?>" alt="image5">
                    <img class="size" src="../image/upload/<?php echo $row[0]['image_5'] ?>" alt="image6">
                </div>
            </div>
            <div class="d-flex justify-content-center room">
                <div>
                    <h1>ราคา <?php echo $row[0]['price'] ?> บาท</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="d-flex justify-content-center room">
        <div class="detail">
            <img class="size-2" src="../image/upload/<?php echo $row[0]['image_6'] ?>" alt="image4">
        </div>
        <div class="detail word-next-line">
            <h3>หอ: <?php echo $row[0]['dormitory_room'] ?> </h3>
            <h3>ราคา: <?php echo $row[0]['price'] ?> บาท</h3>
            <h3>ที่อยู่: <?php echo $row[0]['address'] ?> </h3>
            <h3>ติดต่อ: <?php echo $row[0]['contact'] ?> </h3>
            <h3>รายระเอียด: <?php echo $row[0]['desscription'] ?> </h3>
            <h3><i class="fa-brands fa-facebook"></i> <?php echo $row[0]['facebook'] ?> </h3>
            <h3><i class="fa-brands fa-line"></i> <?php echo $row[0]['line'] ?> </h3>
            <h3><i class="fa-brands fa-instagram"></i>. <?php echo $row[0]['facebook'] ?> </h3>
            <?php
            if ($_SESSION) { ?>
                <div class="d-flex justify-content-center room">
                    <div style="margin: auto;">
                        <?php
                        if ($_SESSION['user_id'] == $row[0]['user_id']) {
                            $obj = json_encode($row[0]);
                        ?>
                            <br>
                            <button type="button" name='<?php echo $obj ?>' id="edit2Bt" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit2"><i class="fa-solid fa-screwdriver-wrench" style="height: 18px;width: 18px;"></i> Edit 2 </button>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div class="d-flex justify-content-center room">
        <div class="detail">
            <h5><?php echo $row[0]['other'] ?></h5>
        </div>
    </div>
    <section>
        <div class="d-flex justify-content-center ">
            <iframe src="<?php echo $row[0]['map'] ?>" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </section>
</body>

<!-- edit 2 -->
<div class="modal fade" id="edit2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-deleteLot" action="edit2Submit.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">แก้รายละเอียด มีผลต่อหน้าหลัก</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div>
                        <input type="hidden" name="dormitory_id" value="<?php echo $row[0]['dormitory_id'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="add" class="form-label">รูป ย่อ</label>
                        <input class="form-control" type="file" id="formFile" name="my_file">
                    </div>
                    <div class="form-group">
                        <label for="add" class="form-label">ชื่อ หอ</label>
                        <input type="text" class="form-control" id="editName" name="name" required="required">
                    </div>
                    <div class="form-group">
                        <label for="add" class="form-label">ราคา ฿</label>
                        <input type="number" class="form-control" id="editPrice" name="price" required="required">
                    </div>
                    <div class="form-group">
                        <label for="add" class="form-label">ที่อยู่</label>
                        <input type="text" class="form-control" id="editAddress" name="address" required="required">
                    </div>
                    <div class="form-group">
                        <label for="add" class="form-label">รายระเอียด ย่อ</label>
                        <input type="text" class="form-control" id="editDess" name="desscription" required="required">
                    </div>
                    <div class="form-group">
                        <label for="add" class="form-label">ติดต่อ</label>
                        <input type="text" class="form-control" id="contact" name="contact" required="required">
                    </div>
                    <div class="form-group">
                        <label for="add" class="form-label">Facebook</label>
                        <input type="text" class="form-control" id="facebook" name="facebook" required="required">
                    </div>
                    <div class="form-group">
                        <label for="add" class="form-label">Line</label>
                        <input type="text" class="form-control" id="line" name="line" required="required">
                    </div>
                    <div class="form-group">
                        <label for="add" class="form-label">IG</label>
                        <input type="text" class="form-control" id="ig" name="ig" required="required">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">คำอธิบาย</label>
                        <textarea class="form-control" id="other" name="other" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Map</label>
                        <textarea class="form-control" id="map" name="map" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">edit</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- edit image 1 -->
<div class="modal fade" id="edit1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form id="form-deleteLot" action="edit1Submit.php" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4 class="modal-title">Edt 1</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div>
                        <input type="hidden" name="dormitory_id" value="<?php echo $row[0]['dormitory_id'] ?>">
                    </div>
                    <div>
                        <select name="select" id="file" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option value="0">รูป ที่ 1 (แสดงในหน้าหลักด้วย)</option>
                            <option value="1">รูป ที่ 2</option>
                            <option value="2">รูป ที่ 3</option>
                            <option value="3">รูป ที่ 4</option>
                            <option value="4">รูป ที่ 5</option>
                            <option value="5">รูป ที่ 6</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="add" class="form-label">อัพโหลด</label>
                        <input class="form-control" type="file" id="formFile" name="my_file">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-info">Upload</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../node_modules/jquery/dist/jquery.js"></script>
<script src="../node_modules/@popperjs/core/dist/umd/popper-base.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="../node_modules/@fortawesome/fontawesome-free/js/all.js"></script>
<script src="roomDetail.js"></script>


<?php include("footer.php"); ?>