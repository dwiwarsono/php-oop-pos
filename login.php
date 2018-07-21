<?php

session_start();

        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

        $host ="localhost";
        $user = "root";
        $pass = "";
        $db = "db_pos";

        $koneksi = new mysqli ($host, $user, $pass, $db);

        // if ($koneksi->connect_errno) {// connect_errno untuk menguji apakah konek ke database
        //     // Kalau dia TRUE maka akan menghasilkan apapun yang kita tulis di bawah
        //     echo "Gagal Koneksi Ke Database" . $koneksi->connect_error; // connect_error untuk mengecek apakah error
        // }

        // $koneksi->close();

        if ($_SESSION['admin'] || $_SESSION['kasir']) {
            header("location:index.php");
        }else{

         
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Halaman Login</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css --> 
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <!-- <small>Admin BootStrap Based - Material Design</small> -->
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" method="POST">
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons"></i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons"></i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="pass" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="rememberme">Remember Me</label>
                        </div>
                        <div class="col-xs-4">
                            
                            <input type="submit" name="login" value="Login" class="btn btn-block bg-pink waves-effect">
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                       
                        <div class="col-xs-6 align-right">
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>
</body>

</html>

<?php

            $username = $_POST['username'];
            $password = $_POST['pass'];

            $login = $_POST['login'];

            if ($login) {
                $sql = $koneksi->query("SELECT * FROM tb_pengguna WHERE username='$username' && pass='$password'");

                $valid = $sql->num_rows;

                $data = $sql->fetch_assoc();

                if ($valid >= 1) {

                    session_start();

                    if ($data['hak_akses'] == "admin") {
                        $_SESSION['admin'] = $data[id_pengguna];

                        header("location:index.php");
                    
                    }else if ($data['hak_akses'] == "kasir") {
                        $_SESSION['kasir'] = $data[id_pengguna];
                        header("location:index.php");
                    } 
                    }else {
                        ?>

                           <script type="text/javascript">
                           alert("Login gagal username dan password salah");
                           </script> 

                        <?php
                    }


                
            }


?>

<?php

        }
?>