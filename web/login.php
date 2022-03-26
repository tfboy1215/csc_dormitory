<?php
include("header.php");
?>

<body>
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-7">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">login</h2>

                    <form action="loginSubmit.php" method="POST">
                        <div class="form-outline mb-4">
                            <input type="text" id="user" name="username" class="form-control form-control-lg" placeholder="Username">
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 70.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="password" id="pass" name="password" class="form-control form-control-lg" placeholder="Password">
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 67.2px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
include("footer.php");
?>