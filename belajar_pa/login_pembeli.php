<?php
    session_start();
    if (isset($_SESSION["login_pembeli"])) {
        header("Location: home_pembeli.php");
    }
    require("koneksi.php");
     

    if (isset($_POST["login_pembeli"])) {
        $username_plg = $_POST["username_plg"];
        $password = $_POST["password"];
        
        
       

        $result = mysqli_query($koneksi, "SELECT * FROM customers WHERE username_plg = '$username_plg'");
        // $result->execute(array('usename_plg' => $_POST['username_plg']));
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $_SESSION['id_plg']        = $row['id_plg'];
            $_SESSION['username_plg']  = $row['username_plg'];
            $_SESSION['nama_plg']      = $row['nama_plg'];
            $_SESSION['no_hp_plg']     = $row['no_hp_plg'];
            $_SESSION['password']      = $row['password'];
    

            header("Location:profile_pembeli.php");

            if (password_verify($password, $row["password"])) {

                $_SESSION["login_pembeli"] = $row;
                header("Location:home_pembeli.php");
            } 
        }

        $error = true;
    }


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="login2.css">
    <title>Login</title>
  </head>
  <body>
    
    <div class="global-container">
        <div class="card login-form">
            <div class="card-body">
                <h1 class="card-title text-center">CUSTOMER LOGIN</h1>
                <?php if(isset($error)) : ?>
                    <p style="color:red; font-style:italic; text-align:center">Wrong Username / Password!</p>
                <?php endif; ?>    
            </div>
            <div class="card-text">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="username_plg">Username</label>
                        <input type="text" class="form-control" name="username_plg" id="username_plg" placeholder="Enter Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                    </div>
                    <!-- <div class="form-group">
                        <a href="#" id="signup">Register</a>
                    </div> -->
                    <div class="d-grid gap-2">
                        <button type="submit" name="login_pembeli" class="btn btn-primary">SUBMIT</button>
                    </div>
                    <div class="signup">
                        <p>Don't Have an Account? <a href="register_pembeli.php">Sign up</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
