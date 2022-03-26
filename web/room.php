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
                    <label for="head">แก้อะไรซักอย่าง</label>
                </div>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark bg-dark text-light" placeholder="ค้นหา" aria-label="Search">
                </form>

                <div class="col-md-3 text-end">
                    <a href="login.php"><button type="button" class="btn btn-outline-primary me-2 bg-light">Login</button></a>
                    <button type="button" class="btn btn-primary">Sign-up</button>
                </div>

            </div>

        </div>

    </header>

    <br><br><br>
    <div class="container">
        <?php
        $sql = "SELECT * FROM `dormitory`";
        $result = $conn->query($sql);
        if ($result) {
            $rows = [];
            while ($getData = mysqli_fetch_assoc($result)) {
                array_push($rows, $getData);
            }
            $sizeRows = sizeof($rows);
            for ($i = 0; $i < $sizeRows; $i++) {
                print('<div class="row">');
                if ($i < $sizeRows) {
                    print('<div class="col-sm">');
                    print('<div class="container">');
                    $img = '<img src="../image/' . $rows[$i]['image'] . '" alt="home" style="height: 120px;width: 170px;px;">';
                    print($img);
                    $data = $rows[$i]['dormitory_room'];
                    print('<h6>หอ :' . $data . '</h6>');
                    $data = $rows[$i]['price'];
                    print('<h6>ราคา :' . $data . '</h6>');
                    $data = $rows[$i]['desscription'];
                    print('<h6>สิ่งอำนวยความสะดวก :' . $data . '</h6>');
                    $data = $rows[$i]['address'];
                    print('<h6>ที่อยู่ :' . $data . '</h6>');
                    $data = $rows[$i]['contact'];
                    print('<h6>ติดต่อ :' . $data . '</h6>');
                    print('</div>');
                    print('</div>');
                    $i++;
                }
                if ($i < $sizeRows) {
                    print('<div class="col-sm">');
                    print('<div class="container">');
                    $img = '<img src="../image/' . $rows[$i]['image'] . '" alt="home" style="height: 120px;width: 170px;px;">';
                    print($img);
                    $data = $rows[$i]['dormitory_room'];
                    print('<h6>หอ :' . $data . '</h6>');
                    $data = $rows[$i]['price'];
                    print('<h6>ราคา :' . $data . '</h6>');
                    $data = $rows[$i]['desscription'];
                    print('<h6>สิ่งอำนวยความสะดวก :' . $data . '</h6>');
                    $data = $rows[$i]['address'];
                    print('<h6>ที่อยู่ :' . $data . '</h6>');
                    $data = $rows[$i]['contact'];
                    print('<h6>ติดต่อ :' . $data . '</h6>');
                    print('</div>');
                    print('</div>');
                    $i++;
                }
                if ($i < $sizeRows) {
                    print('<div class="col-sm">');
                    print('<div class="container">');
                    $img = '<img src="../image/' . $rows[$i]['image'] . '" alt="home" style="height: 120px;width: 170px;px;">';
                    print($img);
                    $data = $rows[$i]['dormitory_room'];
                    print('<h6>หอ :' . $data . '</h6>');
                    $data = $rows[$i]['price'];
                    print('<h6>ราคา :' . $data . '</h6>');
                    $data = $rows[$i]['desscription'];
                    print('<h6>สิ่งอำนวยความสะดวก :' . $data . '</h6>');
                    $data = $rows[$i]['address'];
                    print('<h6>ที่อยู่ :' . $data . '</h6>');
                    $data = $rows[$i]['contact'];
                    print('<h6>ติดต่อ :' . $data . '</h6>');
                    print('</div>');
                    print('</div>');
                    $i++;
                }
                print('</div>');
            }
        }
        $conn->close();
        ?>

    </div>
</body>

<?php include("footer.php"); ?>