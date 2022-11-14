<?php
   session_start();
   if (!isset($_SESSION["login_admin"])) {
     header("Location: login_admin.php");
     exit;
   }
 
  

   include('koneksi.php');
  //  $barang = query("SELECT * FROM goods");
   $tampil = mysqli_query($koneksi, "SELECT * FROM customers order by id_plg asc");
  
    

    if (isset($_POST["cari"])) {
        $tampil = mysqli_query($koneksi, "SELECT * FROM customers WHERE 
                               username_plg LIKE '%".$_POST['keyword']."%' OR
                               nama_plg LIKE '%".$_POST['keyword']."%' OR
                               no_hp_plg LIKE '%".$_POST['keyword']."%' 
                               ");

    }
    
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
  <link rel="stylesheet" href="forms1.css">
  <link rel="stylesheet" href="dark_md.css">
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
        <a class="nav-link" href="home.php">HOME<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="tampilan_barang.php">INVENTORY DATA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data_admin.php">ADMIN DATA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="data_pembeli.php">BUYER DATA</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="data_pesanan.php">ORDER DATA</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">LOGOUT</a>
        </li>
        <li class="nav-item">
            <input type="checkbox" onclick="ubahMode()">
            <script>
                function ubahMode(){
                    var r = confirm("Do You Want To Change The Mode?");
                    if (r == true) { 
                        var element = document.body;
                        element.classList.toggle("dark");
                    }  
                }
            </script>
          </li>
      </ul>
        <form action="" method="post" class="form-inline my-2 my-lg-0">
        <input type="text" name="keyword" class="form-control mr-sm-2"  placeholder="Search" aria-label="Search">
        <button name="cari" class="btn btn-outline-success my-2 my-sm-0 bg-dark" type="submit">Search</button>
        </form>
    </div>
  </nav>
  <div class="tabel col-md-10" style=" margin-left: 150px;">
        <h2 class="alert alert-dark text-center mt-5" style="background-color: #28a745";>CUSTOMER DATA DISPLAY</h2>
        <table rules="rows" class="table table-dark mt-2">
          <a href="create_pembeli.php" class="btn btn-success">ADD DATA</a>
          <thead>
              <tr>
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Name</th>
              <th scope="col">Telephone</th>
              <th scope="col">Password</th>
              <th scope="col">Action</th>
              </tr>
          </thead>
          <?php $i = 1; ?>
          <?php
            while($data = mysqli_fetch_array($tampil)):
          ?>
          <tbody>
         
              <tr>
                  <th scope="row"><?= $i; ?></th>
                  <td><?=$data['username_plg'] ?></td>
                  <td><?=$data['nama_plg'] ?></td>
                  <td><?=$data['no_hp_plg'] ?></td>
                  <td><?=$data['password'] ?></td>
                  <td>
                    <a href="update_pembeli.php?id=<?=$data['id_plg'] ?>" class="btn btn-success">Edit</a>
                    <a href="delete_pembeli.php?id=<?=$data['id_plg'] ?>" class="btn btn-danger">Delete</a>
                  </td>
              </tr>
          <?php $i++; ?>
          <?php endwhile; ?>
        </table>
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

