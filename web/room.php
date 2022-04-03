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
                    <label for="head">
                        <h1 class="display-5">หอพัก CSC</h1>
                    </label>
                </div>
                <div class="col-md-3 text-end">
                    <a href="login.php"><button type="button" class="btn btn-outline-primary me-2 bg-light">Login</button></a>
                    <button type="button" class="btn btn-primary">Sign-up</button>
                </div>
            </div>

        </div>

    </header>

    <div class="room">

        <table id="datatable" class="table table-hover" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>หอ</th>
                    <th>ราคา</th>
                    <th>รายระเอียด</th>
                    <th>ที่อยู่</th>
                    <th>contacะ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `dormitory`";
                $result = $conn->query($sql);
                $conn->close();
                if ($result) {
                    $row = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        print('<tr>');
                        print('<td>');
                        print('<div>');
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
                        print('<div class = "word-next-line{">');
                        print($row['desscription']);
                        print('</div>');
                        print('</td>');
                        print('<td>');
                        print('<div>');
                        print($row['address']);
                        print('</div>');
                        print('</td>');
                        print('<td>');
                        print('<div>');
                        print($row['contact']);
                        print('</div>');
                        print('</td>');
                        print('</tr>');
                    }
                }
                ?>
            </tbody>
        </table>
        <script src="../node_modules/jquery/dist/jquery.js"></script>
        <script src="../node_modules/datatables.net/js/jquery.dataTables.js"></script>
        <script>
            $(document).ready(function() {
                $('#datatable').DataTable({
                    "scrollX": true
                });
            });
        </script>
    </div>
    </div>
</body>

<?php include("footer.php"); ?>