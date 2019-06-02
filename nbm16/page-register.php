<?php
session_start();
if (isset($_SESSION['uid'])) {
    header('Location: index.php');
}
require_once "process.php";
include 'header.php';
?>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">

                </div>
                <?php
                // Üzenet megjelefsdfsdnítése
                if (isset($uzenet)) {
                    ?>
                    <div class="alert alert-success">
                        <p class="text-danger text-center"
                        style="position: relative;top: 0.5em;"><?php print $uzenet; ?></p>
                    </div>
                    <?php
                }
                ?>
                <div class="login-form">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Felhasználó név</label>
                            <input type="name" class="form-control" name="nev" id="nev" placeholder="Felhasználó név">
                        </div>
                        <div class="form-group">
                            <label>Email cím</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email cím">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="jelszo" id="jelszo" placeholder="Jelszó">
                        </div>
                        <div class="form-group">
                            <label>Jelszó újra</label>
                            <input type="password" name="jelszo2" id="jelszo2" class="form-control" placeholder="Jelszó újra" required>
                        </div>
                        <div>
                            <input type="hidden" name="event" id="event" value="regisztráció">
                            <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Regisztrálás</button>
                        </div><br>
                        <div class="register-link m-t-15 text-center">
                            <p>Sikeres regisztráció ? <a href="page-login.php"> Jelentkezz be</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>