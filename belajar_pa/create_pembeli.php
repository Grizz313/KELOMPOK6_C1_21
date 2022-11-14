<?php
    session_start();
    if (!isset($_SESSION["login_pembeli"])) {
      header("Location: login_pembeli.php");
    }

  include('koneksi.php');
  $id_barang = $_GET['id_barang'];
  $id_plg  = $_SESSION['id_plg'];
  $ambil = mysqli_query($koneksi, "SELECT * FROM goods where id_barang = '$id_barang'" );
 
  
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CREATE BUYER</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="forms1.css">
  <link rel="stylesheet" href="pembeli.css">  
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
  <div class="container" style="margin: 90px 300px;">

            
        <?php if ( mysqli_num_rows($ambil) > 0 ) : ?>
          <?php while ($a = mysqli_fetch_array($ambil)): ?>

            <div class="container1">
                  <div class="profile1">
                  <img src="img/<?php echo $a['gambar']?>" width="100px" alt="" srcset="">
                  <h2 style = "font-family:'Poppins', sans-serif";>Item Name   : <?php echo $a['nama_barang']?></h2>
                  <h2 style = "font-family:'Poppins', sans-serif";>Item Type   : <?php echo $a['jenis_barang']?></h2>
                  <h2 style = "font-family:'Poppins', sans-serif";>Item Status : <?php echo $a['status_barang']?></h2>
                  <h2 style = "font-family:'Poppins', sans-serif";>Item Price  : <?php echo $a['harga_barang']?></h2>
                  </div>
        </div>
                  
          
        <h2 class="alert alert-dark text-center mt-5 col-md-8" style="background-color: #28a745;">ORDER ITEM</h2>
        <form action="" method="POST" enctype="multipart/form-data">
             <input type="hidden" name="id_plg" value="<?php echo $id_plg;?>">
             <input type="hidden" name="id_barang" value="<?php echo $id_barang;?>">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success" >
                        <label for="jmlh_pesanan">Order Quantity:</label>
                        <input type="number" name="jmlh_pesanan" class="form-control" placeholder="Enter Order Quantity">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="alamt">Address:</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Enter Address Custumers">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="harga_barang">Item Prices:</label>
                        <input type="number" name="harga_barang" value="<?= $a['harga_barang'] ?>" class="form-control" placeholder="Enter Item Prices" readonly>
                    </div>
                </div>
            </div>
           
            <button type="submit" name="submit"  class="btn btn-success">SUBMIT</button>
        </form>
        <?php endwhile; ?>
      <?php endif?>
      <?php
        if (isset($_POST['submit'])) {
            $id_plg = $_POST['id_plg'];
            $id_barang = $_POST['id_barang'];
            $jmlh_pesanan = $_POST['jmlh_pesanan'];
            $alamat = $_POST['alamat'];
            $harga_barang =  $_POST['harga_barang'];
            $total_harga_barang = $harga_barang * $jmlh_pesanan;
            date_default_timezone_set("Asia/Makassar");
            $tgl_pesanan = date("Y-m-d H:i:s");

            $beli = mysqli_query($koneksi, "INSERT INTO orders values( 
                null,
                '".$id_plg."',
                '".$id_barang."',
                '".$jmlh_pesanan."',
                '".$total_harga_barang."',
                '".$tgl_pesanan."',
                '".$alamat."'
             )" );

             if ($beli) {
                 echo "<script>
                 alert('Your Order Has Been Successful');
                 </script>";
                
                 header("Location: home_pembeli.php");
              
                 
             }else{
                echo "<script>
                alert('Your Order Failed')</script>";
             }
        }
    ?>
   </div>
  <section class="footer" style="background-color: #28a745";>
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