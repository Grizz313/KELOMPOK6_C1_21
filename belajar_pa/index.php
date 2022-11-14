<?php
  include('koneksi.php');
  //  $barang = query("SELECT * FROM goods");
   $tampil = mysqli_query($koneksi, "SELECT * FROM goods order by id_barang asc");

    if (isset($_POST["cari"])) {
      $tampil = mysqli_query($koneksi, "SELECT * FROM goods WHERE 
                            nama_barang LIKE '%".$_POST['keyword']."%' OR
                            stok_barang LIKE '%".$_POST['keyword']."%' OR
                            status_barang LIKE '%".$_POST['keyword']."%' OR
                            jenis_barang LIKE '%".$_POST['keyword']."%' OR 
                            harga_barang LIKE '%".$_POST['keyword']."%' 
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
  <link rel="stylesheet" href="dark_md.css">
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
            <a class="nav-link" href="#">HOME <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">ABOUT US</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              LOGIN
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="login_admin.php">Admin</a>
              <a class="dropdown-item" href="login_pembeli.php">Customer</a>
            </div>
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
          <button name="cari" class="btn btn-outline-dark my-2 my-sm-0 bg-success" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <div class="tipe">
      <marquee scrollamount="10" id="text" behavior="" direction=""><h1>WELCOME TO ALL SPORT!</h1></marquee>
    </div>
    <div class="logo" >
      <img id="foto" src="gambar1.png" alt="" srcset="">
    </div>
    <div class="title-item">
      <p><b>OUR PRODUCT:</b></p>
    </div>
    <?php
        while($data = mysqli_fetch_array($tampil)):
      ?>
    <div class="card-row">
      <div class="card-coulmn">
        <div class="card">
          <img src="img/<?=$data['gambar'] ?>"alt="">
          <br>
          <p><?=$data['nama_barang'] ?></p>
          <p>$ <?=$data['harga_barang'] ?></p>
          <a href="login_pembeli.php">Click Here To Buy!</a>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
    <div class="title-item">
      <p style="margin-top: 400px;"><b>ABOUT OUR COMPANY:</b></p>
    </div>
    <div class="profile" style="max-width: 1000px";>
      <p>
        <img id="gambar" class="profile__image" src="LOGO 2.png" alt="profile image">
      </p>
      <div class="profile__name">WELCOME TO ALL SPORT!</div>
      <div class="profile__title">
        <p>ALL SPORT was founded in 2020. Our Founder are groups of student from Mulawarman University.
          At ALL SPORT, We encourage our community to feel free to be theirself.</p>
       
      </div>
      <div class="profile__detail">
        <i class="icon-male"></i>
          12.000 MEMBERS
      </div>
    </div>
    <section class="footer">
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
  <!-- <script>
    $(document).ready(function(){
      $("#text").on({
          mouseover: function(){
              $(this).css("color", "red");
          }
      }); 
      
      $("#text").on({
          mouseout: function(){
              $(this).css("color", "black");
          }
      });    
    });

  </script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="script1.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>