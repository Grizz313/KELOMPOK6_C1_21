
<?php
    session_start();
    if (!isset($_SESSION["login_pembeli"])) {
      header("Location: login_pembeli.php");
    }

    include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KELOMPOK 6 PA</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="profile1.css">
  <link rel="stylesheet" href="dark_md.css">
  <link rel="stylesheet" href="pembeli.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand text-success" href="#">ALL SPORT!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home_pembeli.php">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="profile_pembeli.php">PROFILE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">LOGOUT</a>
          </li>
      </ul>
    </div>
  </nav>
  <div class="global-container1">
        <div class="card login-form1">
            <div class="card-body">
                <h1 class="card-title text-center">PROFILE CUSTOMER</h1>
                
            </div>
            <div class="card-text">
                <form action="" method="post">
                <?php
                    $tampilPeg    =mysqli_query($koneksi, "SELECT * FROM customers WHERE id_plg ='$_SESSION[id_plg]'");
                    $peg    =mysqli_fetch_array($tampilPeg);
                ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" value="<?=$peg['username_plg']?>" name="username" id="username" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="nama">Name</label>
                        <input type="text" class="form-control" value="<?=$peg['nama_plg']?>" name="nama" id="nama" placeholder="Enter Nama">
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Telephone</label>
                        <input type="text" class="form-control" value="<?=$peg['no_hp_plg']?>" name="no_hp" id="no_hp" placeholder="Enter No Hp">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text"  class="form-control"  name="password" id="password" placeholder="Password">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" name="update" class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
                <?php
                  if (isset($_POST['update'])) {
                     $username = mysqli_real_escape_string($koneksi, $_POST['username']);
                     $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
                     $no_hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
                     $password = mysqli_real_escape_string($koneksi, $_POST['password']);

                     if (empty($username) OR empty($nama) OR empty($no_hp)) {
                        echo "Field Still Empty";
                     }else{
                       if (empty($password)) {
                           $id_plg =  $_SESSION['id_plg'];
                           $sql = " UPDATE `customers` SET 
                           username_plg = '$username',
                           nama_plg = '$nama',
                           no_hp_plg = '$no_hp' 
                           WHERE id_plg = '$id_plg'; ";

                           if (mysqli_query($koneksi, $sql)) {
                            $_SESSION['username_plg']  = $username;
                            $_SESSION['nama_plg']      = $nama;
                            $_SESSION['no_hp_plg']     =  $no_hp;

                            header("Location:profile_pembeli.php");
                           }else{
                             echo "error";
                           }
                        }else{
                          $hash = password_hash($password, PASSWORD_DEFAULT);
                          $id_plg =  $_SESSION['id_plg'];
                          $sql2 = " UPDATE `customers` SET 
                          username_plg = '$username',
                          nama_plg = '$nama',
                          no_hp_plg = '$no_hp',
                          password = '$hash'
                          WHERE id_plg = '$id_plg'; ";
                          if (mysqli_query($koneksi, $sql2)) {
                            session_unset();
                            session_destroy();
                             
                           header("Location: login_pembeli.php");
                          }else{
                            echo "error";
                          }

                        }
                     }
                  }
                ?>
            </div>
        </div>
    </div>
  <section class="footer1">
    <div class="social">
    <a href="https://www.instagram.com/metanocrzrt_/"><i class="fab fa-instagram"></i></a>
    <a href="https://twitter.com/jokowi"><i class="fab fa-twitter"></i></a>
    <a href="https://id-id.facebook.com/Jokowi/"><i class="fab fa-facebook"></i></a>
    <a href="https://wa.me/6282150808102"> <i class="fab fa-whatsapp"></i> </a>
    </div>
    <ul class="list">
      <li>
        <a href="#">Home</a>
      </li>
      <li>
        <a href="#">Services</a>
      </li>
      <li>
        <a href="#">About</a>
      </li>
      <li>
        <a href="#">Terms</a>
      </li>
      <li>
        <a href="#">Privacy Policy</a>
      </li>
    </ul>
    <p class="copyright">
    LIVE A HEALTHIER LIFE &copy;2022 - by ALL SPORT COMMUNITY
    </p>
  </section>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>