<?php
//███▄ ▄███▓ ▄▄▄       ██▀███   ██ ▄█▀  ██████  ▒█████   ██▓     █    ██ ▄▄▄█████▓ ██▓ ▒█████   ███▄    █   ██████
//▓██▒▀█▀ ██▒▒████▄    ▓██ ▒ ██▒ ██▄█▒ ▒██    ▒ ▒██▒  ██▒▓██▒     ██  ▓██▒▓  ██▒ ▓▒▓██▒▒██▒  ██▒ ██ ▀█   █ ▒██    ▒
//▓██    ▓██░▒██  ▀█▄  ▓██ ░▄█ ▒▓███▄░ ░ ▓██▄   ▒██░  ██▒▒██░    ▓██  ▒██░▒ ▓██░ ▒░▒██▒▒██░  ██▒▓██  ▀█ ██▒░ ▓██▄
//▒██    ▒██ ░██▄▄▄▄██ ▒██▀▀█▄  ▓██ █▄   ▒   ██▒▒██   ██░▒██░    ▓▓█  ░██░░ ▓██▓ ░ ░██░▒██   ██░▓██▒  ▐▌██▒  ▒   ██▒
//▒██▒   ░██▒ ▓█   ▓██▒░██▓ ▒██▒▒██▒ █▄▒██████▒▒░ ████▓▒░░██████▒▒▒█████▓   ▒██▒ ░ ░██░░ ████▓▒░▒██░   ▓██░▒██████▒▒
//░ ▒░   ░  ░ ▒▒   ▓▒█░░ ▒▓ ░▒▓░▒ ▒▒ ▓▒▒ ▒▓▒ ▒ ░░ ▒░▒░▒░ ░ ▒░▓  ░░▒▓▒ ▒ ▒   ▒ ░░   ░▓  ░ ▒░▒░▒░ ░ ▒░   ▒ ▒ ▒ ▒▓▒ ▒ ░
//░  ░      ░  ▒   ▒▒ ░  ░▒ ░ ▒░░ ░▒ ▒░░ ░▒  ░ ░  ░ ▒ ▒░ ░ ░ ▒  ░░░▒░ ░ ░     ░     ▒ ░  ░ ▒ ▒░ ░ ░░   ░ ▒░░ ░▒  ░ ░
//░      ░     ░   ▒     ░░   ░ ░ ░░ ░ ░  ░  ░  ░ ░ ░ ▒    ░ ░    ░░░ ░ ░   ░       ▒ ░░ ░ ░ ▒     ░   ░ ░ ░  ░  ░
//       ░         ░  ░   ░     ░  ░         ░      ░ ░      ░  ░   ░               ░      ░ ░           ░       ░
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
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="jelszo" id="jelszo" placeholder="Password">
                        </div>
                        <div class="checkbox">

                        </div>
                        <div>
                            <input type="hidden" name="event" id="event" value="bejelentkezés">
                            <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Bejentkezés</button>
                        </div><br>
                        <div class="register-link m-t-15 text-center">
                            <p>Nem regisztrálva ? <a href="page-register.php"> Regisztrálj itt</a></p>
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