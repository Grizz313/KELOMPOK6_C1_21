<?php
    session_start();
    if (!isset($_SESSION["login_admin"])) {
      header("Location: login_admin.php");
    }
  include('koneksi.php');
 
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPDATE CUSTOMER</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="forms1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-success">
    <a class="navbar-brand text-dark" href="#">ALL SPORT!</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="home.php">HOME <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tampilan_barang.php">ITEM DATA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data_admin.php">ADMIN DATA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data_pembeli.php">CUSTOMER DATA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="data_pesanan.php">ORDER DATA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">LOGOUT</a>
          </li>
      </ul>
    </div>
  </nav>
  <div class="container" style="margin: 90px 300px;">
        <h2 class="alert alert-dark text-center mt-5 col-md-8" style="background-color: #28a745">CUSTOMER DATA FORMS</h2>
        <form action="" method="POST" enctype="multipart/form-data">
        <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM customers WHERE id_plg = '" . $_GET['id'] . "'");
            if (mysqli_num_rows($tampil) > 0) {
                while ($row = mysqli_fetch_array($tampil)) {
                  
        ?>
             <input type="hidden" name="id_plg" value="<?php echo $row['id_plg']; ?>">
             <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="username_plg">Username:</label>
                        <input type="text" name="username_plg" value="<?php echo $row['username_plg']; ?>" class="form-control" placeholder="Enter Username">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="nama_plg">Name:</label>
                        <input type="text" name="nama_plg" value="<?php echo $row['nama_plg']; ?>" class="form-control" placeholder="Enter Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="no_hp_plg">Telephone:</label>
                        <input type="text" name="no_hp_plg" value="<?php echo $row['no_hp_plg']; ?>" class="form-control" placeholder="Enter Telephone Number">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="password">Password:</label>
                        <input type="password" name="password"  class="form-control" placeholder="Enter Password">
                    </div>
                </div>
            </div>
        <?php
            }
        }
        ?>
            <button type="submit" name="submit"  class="btn btn-primary">SUBMIT</button>
        </form>
        <?php
             function input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
    
            }
            if (isset($_POST['submit'])) {
                $id         = input($_POST['id_plg']);
                $username   = input($_POST['username_plg']);
                $nama       = input($_POST['nama_plg']);
                $no_hp      = input($_POST['no_hp_plg']);
                $password   = input($_POST['password']);
                $password = password_hash($password, PASSWORD_DEFAULT);
               
                $update = mysqli_query($koneksi, "UPDATE customers SET 
                    username_plg = '$username',
                    nama_plg     = '$nama',
                    no_hp_plg    = '$no_hp',
                    password     = '$password'
                    WHERE id_plg = '$id'"
            
                );
    
                if ($update) {
        ?>
                <script>
                            alert("Data Success Being Updated");
                            window.location=('data_pembeli.php');
                </script>
         <?php
            } else {
                echo "Failed To Update" . mysqli_error($koneksi);
            }
        }
        ?>
   </div>
  <section class="footer" style="background-color: #28a745">
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