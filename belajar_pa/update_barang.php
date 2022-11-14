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
  <title>UPDATE ITEM</title></title>
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
      <form class="form-inline my-2 my-lg-0">
      <input type="text" name="keyword" class="form-control mr-sm-2"  placeholder="Search" aria-label="Search">
          <button name="cari" class="btn btn-outline-success my-2 my-sm-0 bg-dark" type="submit">Search</button>
      </form>
    </div>
  </nav>
  <div class="container" style="margin: 90px 300px;">
        <h2 class="alert alert-dark text-center mt-5 col-md-8" style="background-color: #28a745">UPDATE ITEM FORMS</h2>
        <form action="" method="POST" enctype="multipart/form-data">
        
        <?php
            $tampil = mysqli_query($koneksi, "SELECT * FROM goods WHERE id_barang = '" . $_GET['id_barang'] . "'");
            if (mysqli_num_rows($tampil) > 0) {
                while ($row = mysqli_fetch_array($tampil)) {
                  
        ?>
            <input type="hidden" name="id_barang" value="<?php echo $row['id_barang']; ?>">
            <input type="hidden" name="gambarLama" value="<?php echo $row['gambar']; ?>">
            
             <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="nama_barang">Equipment Name:</label>
                        <input type="text" name="nama_barang" value="<?php echo $row['nama_barang']; ?>"  class="form-control" placeholder="Enter Equipment Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="jenis_barang">Type Of Equipment:</label>
                        <input type="text" name="jenis_barang" value="<?php echo $row['jenis_barang']; ?>" class="form-control" placeholder="Enter Type Of Equipment">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="stok_barang">Item Stock:</label>
                        <input type="number" name="stok_barang" value="<?php echo $row['stok_barang']; ?>" class="form-control" placeholder="Enter Stock Item">
                    </div>
                </div>
            </div>
            <div class="form-group text-success">
                <label for="status_barang">Status: </label>
                <div class="row">
                    <div class="col-md-8 text-success">
                      <div class="form-control">
                        <input type="radio" name="status_barang"  value="ready" <?php if($row['status_barang'] == "ready")echo "checked"?> >Ready
                        <input type="radio" name="status_barang" value="tidak" <?php if($row['status_barang'] == "tidak")echo "checked"?>>Empty
                      </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8 text-success">
                        <label for="harga_barang">Item Price:</label>
                        <input type="number" name="harga_barang" value="<?php echo $row['harga_barang']; ?>" class="form-control" placeholder="Enter Item Price">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="gambar col-md-8 text-success">
                        <label for="gambar">Item Image:</label><br>
                        <img class="gambar" style="margin: 8px 10px;" src="<?php echo $row['gambar']; ?>" height="80px" alt="" srcset="">
                        <br>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                </div>
            </div>
            <!-- <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="tanggal">Date & Time(Can not Be Changed!):</label>
                        <input type="text" name="tanggal" value="<?php echo $row['tanggal']; ?>" class="form-control" placeholder="Enter Item Stock" readonly>
                    </div>
                </div>
            </div> -->

            
            <?php
                }
            }
            ?>
            <button type="submit" name="submit" value="update"  class="btn btn-primary">CHANGE DATA</button>
        </form>
        <?php
        function upload()
        {
          $namaFile = $_FILES['gambar']['name'];
          $ukuranFile = $_FILES['gambar']['size'];
          $error = $_FILES['gambar']['error'];
          // $tmpName = $_FILES['gambar']['tmp_name'];
          $tmp = $_FILES['gambar']['tmp_name'];
    
          if ($error == 4) {
              echo " <script>
                      alert('Choose Image First');
                      window.location=('forms.php');
                    </script> ";
              return false;
          }
    
          $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
          $ekstensiGambar = explode('.', $namaFile);
          $ekstensiGambar = strtolower(end($ekstensiGambar));
    
          if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
              echo " <script>
                alert('Your Not Uploaded An Image');
                window.location=('tampilan.php');
              </script> ";
              return false;
          }
    
          if ( $ukuranFile > 1000000) {
                echo " <script>
                        alert('Image Size Too Big!');
                        window.location=('tampilan.php');
                      </script> ";
                return false;
            # code...
          }
    
          //generate nama baru
          // $namaFileBaru = uniqid();
          // $namaFileBaru .= '.';
          // $namaFileBaru .= $ekstensiGambar;
          // var_dump($namaFileBaru);
    
          move_uploaded_file($tmp, 'img/'.$namaFile);
      
    
          return $namaFile;
        }
        function input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;

        }
        if (isset($_POST['submit'])) {
            $id         = input($_POST['id_barang']);
            $nama       = input($_POST['nama_barang']);
            $jenis      = input($_POST['jenis_barang']);
            $stok       = input($_POST['stok_barang']);
            $status     = input($_POST['status_barang']);
            $harga      = input($_POST['harga_barang']);
            $gambarLama = input($_POST['gambarLama']);
            // $tanggal    = input($_POST['tanggal']);
            date_default_timezone_set("Asia/Makassar");
            $tanggal = date("Y-m-d H:i:s");
            

            if ($_FILES['gambar']['error'] === 4) {
              $gambar = $gambarLama;
            }else{
              $gambar = upload();
            }

            $update = mysqli_query($koneksi, "UPDATE goods SET 
                nama_barang = '$nama',
                jenis_barang = '$jenis',
                stok_barang = '$stok',
                status_barang = '$status',
                harga_barang = '$harga',
                gambar = '$gambar',
                tanggal = '$tanggal'
                WHERE id_barang = '$id'"
        
            );

            if ($update) {
        ?>
                <script>
                    alert("Data Success Being Updated");
                    window.location=('tampilan_barang.php');
                </script>
        <?php
            } else {
                echo "Update Failed" . mysqli_error($koneksi);
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