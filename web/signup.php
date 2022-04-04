<?php
include("header.php");
?>

<body>
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-7">
            <div class="card" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <h2 class="text-uppercase text-center mb-5">Sign-up</h2>
                    <?php
                    if ($_GET) {
                        if($_GET['error'] == "Y"){
                            print('<h4 style="color: red;">pls check username </h4>');
                        }
                    }
                    ?>
                    <form action="signupSubmit.php" method="POST">
                        <div class="form-outline">
                            <label for="sigup">Username</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="user" name="username" class="form-control form-control-lg" placeholder="Username" required="required">
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 70.4px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>
                        <div class="form-outline">
                            <label for="sigup">Password</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="password" id="pass" name="password" class="form-control form-control-lg" placeholder="Password" required="required">
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 67.2px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>
                        <div class="form-outline">
                            <label for="sigup">Name</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="name" name="name" class="form-control form-control-lg" placeholder="Name" required="required">
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 67.2px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>
                        <div class="form-outline">
                            <label for="sigup">Last Name</label>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="text" id="lastName" name="last_name" class="form-control form-control-lg" placeholder="Last Name" required="required">
                            <div class="form-notch">
                                <div class="form-notch-leading" style="width: 9px;"></div>
                                <div class="form-notch-middle" style="width: 67.2px;"></div>
                                <div class="form-notch-trailing"></div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-light">Sign-up</button>
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