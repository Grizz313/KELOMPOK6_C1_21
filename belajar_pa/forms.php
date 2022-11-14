<?php
    session_start();
    if (!isset($_SESSION["login_admin"])) {
      header("Location: login_admin.php");
    }
  include('koneksi.php');
  

  
  if(isset($_POST['submit'])){
      
      $nama = $_POST['nama_barang'];
      $jenis = $_POST['jenis_barang'];
      $stok = $_POST['stok_barang'];
      $status = $_POST['status_barang'];
      $harga = $_POST['harga_barang'];
      //upload gambar
      $namaFile = $_FILES['file']['name'];
      $tmpName = $_FILES['file']['tmp_name'];
      $ukuranFile = $_FILES['file']['size'];
      $error = $_FILES['file']['error'];
      $tipeFile = $_FILES['file']['type'];
     $max_size = 5120000;


      if ($error == 4) {
          echo " <script>
                  alert('Choose Image First');
                  window.location=('forms.php');
                </script> ";
          return false;
      }
      $namaFileBaru = uniqid();
      $ekstensiGambarValid = array('jpg', 'jpeg', 'png', '');
      $ekstensiGambar = explode('.', $namaFile);
      $ekstensiGambar2 = $ekstensiGambar[1];
      $namaBaru = $namaFileBaru.'.'.$ekstensiGambar2;
      $ekstensiGambar = strtolower(end($ekstensiGambar));

      
      
     
      if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
          echo " <script>
            alert('What You Upload Is Not An Image!');
            window.location=('tampilan_barang.php');
          </script> ";
          return false;
      }

      if ( $ukuranFile > $max_size) {
            echo " <script>
                    alert('Your Image Size is Too Big!');
                    window.location=('tampilan_barang.php');
                  </script> ";
            return false;
        # code...
      }

      //generate nama baru
      
      // $namaFileBaru .= '.';
      // $namaFileBaru .= $ekstensiGambar;
      // var_dump($namaFileBaru);
      move_uploaded_file($tmpName, "./img/".$namaBaru);

      
      // $tanggal = $_POST['tanggal];
      date_default_timezone_set("Asia/Makassar");
      $tanggal = date("Y-m-d H:i:s");

      $create = mysqli_query($koneksi,"INSERT INTO goods VALUES(
         null,
         '".$nama."',
         '".$jenis."',
         '".$stok."',
         '".$status."',
         '".$harga."',
         '".$namaBaru."',
         '".$tanggal."'
   
      )");
      
   
      if($create){
         echo "<script>
                alert('Data Added Successfully');
                window.location=('tampilan_barang.php');
              </script>";

      } else {
        //  echo "gagal" . mysqli_error($koneksi);
         echo "<script>
                alert('Data Failed To Add!);
                window.location=('forms.php');
              </script>";
      }

      
   }

    // function upload()
    //   {
    //     $file = $_FILES['file'];
    //   $namaFile = $_FILES['file']['name'];
    //   $tmpName = $_FILES['file']['tmp_name'];
    //   $ukuranFile = $_FILES['file']['size'];
    //   $error = $_FILES['file']['error'];
    //   $tipeFile = $_FILES['file']['type'];
      
    //   $fileExt = explode('.', $namaFile);
    //   $fileActualExt = strtolower(end($fileExt));

    //   $allowed = array('jpg', 'jpeg', 'png');
    //   if (in_array($fileActualExt, $allowed)) {
    //       if ($error === 0) {
    //           if ($ukuranFile < 1000000) {
    //             $fileNameNew = uniqid('', true).".".$fileActualExt;
    //             $lokasiFile = 'uploads/'.$fileNameNew;
    //             move_uploaded_file($tmpName, $lokasiFile);
    //             header("Location:tampilan_barang.php");
    //           }else{
    //             echo " <script>
    //                   alert('ukuran file anda melebihi maksimum');
    //                 </script> ";
    //           }
    //       }else{
    //         echo " <script>
    //                   alert('upload file anda terjadi kesalahan');
    //                 </script> ";
    //       }
    //   }else{
    //     echo " <script>
    //               alert('file anda tidak sesuai type yang ada');
    //             </script> ";
    //   }
    // }



  

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADD ITEM</title>
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
          <a class="nav-link" href="home.php">HOME<span class="sr-only">(current)</span></a>
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
        <h2 class="alert alert-dark text-center mt-5 col-md-8" style="background-color: #28a745">ITEM DATA FORMS</h2>
        <form action="" method="POST" enctype="multipart/form-data">
             <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="nama_barang">Equipment Name:</label>
                        <input type="text" name="nama_barang" class="form-control" placeholder="Enter Equipment Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="jenis_barang">Type Of Equipment:</label>
                        <input type="text" name="jenis_barang" class="form-control" placeholder="Type Of Equipment">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="stok_barang">Item Stock:</label>
                        <input type="number" name="stok_barang" class="form-control" placeholder="Enter Item Stock">
                    </div>
                </div>
            </div>
            <div class="form-group text-success">
                <label for="status_barang">Status: </label>
                <div class="row">
                    <div class="col-md-8 text-success">
                      <div class="form-control">
                        <input type="radio" name="status_barang" value="ready">Ready
                        <input type="radio" name="status_barang" value="tidak">Empty
                      </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="harga_barang">Item Price:</label>
                        <input type="number" name="harga_barang" class="form-control" placeholder="Enter Item Price">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="gambar">Item Image:</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="tanggal">Tanggal & Waktu:</label>
                        <input type="datetime-local" name="tanggal" class="form-control">
                    </div>
                </div>
            </div> -->
            <button type="submit" name="submit"  class="btn btn-primary">ADD DATA</button>
        </form>
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