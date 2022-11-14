<?php
    include('koneksi.php');
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UPDATE ORDER</title>
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
        <h2 class="alert alert-dark text-center mt-5 col-md-8" style="background-color: #28a745">UPDATE ORDER FORMS</h2>
        <form action="" method="POST" enctype="multipart/form-data">
        <?php
           $tampil = mysqli_query($koneksi, "SELECT * FROM orders 
           INNER JOIN customers on orders.id_plg  =  customers.id_plg
           INNER JOIN goods on orders.id_barang  =  goods.id_barang
           WHERE orders.id_pesanan = '" . $_GET['id'] . "'
             order by id_pesanan asc");
        if (mysqli_num_rows($tampil) > 0) {
                while ($row = mysqli_fetch_array($tampil)) {
                $pesanan = $row['jmlh_pesanan'];
                $total = $pesanan * $row['harga_barang'];
                  
        ?>
            <input type="hidden" name="id_pemesan" value="<?php echo $row['id_pesanan']; ?>">
            <input type="hidden" name="gambarLama" value="<?php echo $row['gambar']; ?>">
             <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="nama_psn">Customer Name:</label>
                        <input type="text" name="nama_pemesan"  value="<?php echo $row['nama_plg']; ?>" class="form-control" placeholder="Enter Customer Name" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="nama_barang">Item Name:</label>
                        <input type="text" name="nama_barang"  value="<?php echo $row['nama_barang']; ?>"  class="form-control" placeholder="Enter Item Name" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="jmlh_pesanan">Order Quantity:</label>
                        <input type="number" value="<?php echo $row['jmlh_pesanan']; ?>" name="jmlh_pesanan"  class="form-control" placeholder="Enter Order Quantity">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="total_harga_pesanan">Order Total Price:</label>
                        <input type="number" value="<?php echo $total; ?>" name="total_harga_pesanan"  class="form-control" placeholder="Enter Total Order Price" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="tgl_pesanan">Order Date:</label>
                        <input type="date" value="<?php echo $row['tgl_pesanan']; ?>"  name="tgl_pesanan" class="form-control" placeholder="Enter Order Date">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-8">
                        <label for="alamat">Address:</label>
                        <input type="text" value="<?php echo $row['alamat']; ?>" name="alamat"  class="form-control" placeholder="Enter Address">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="gambar col-md-8">
                        <label for="gambar">Item Image:</label><br>
                        <img class="gambar" style="margin: 8px 10px;" src="<?php echo $row['gambar']; ?>" height="80px" alt="" srcset="">
                        <br>
                        <!-- <input type="file" name="gambar" class="form-control"> -->
                    </div>
                </div>
            </div>
        <?php
            }
        }
        ?>
       
            <button type="submit" name="submit"  class="btn btn-primary">CHANGE</button>
        </form>
        <?php
             function input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
    
            }
            if (isset($_POST['submit'])) {
                $id_pesanan            = input($_POST['id_pesanan']);
                $nama_pemesan          = input($_POST['nama_pemesan']);
                $nama_barang           = input($_POST['nama_barang']);
                $jmlh_pesanan          = input($_POST['jmlh_pesanan']);
                $total_harga_pesanan   = input($_POST['total_harga_pesanan']);
                $tgl_pesanan           = input($_POST['tgl_pesanan']);
                $alamat                = input($_POST['alamat']);
                $gambar                = input($_POST['gambarLama']);

                // var_dump($nama_pemesan);
                // var_dump($nama_nama_barang);
                // var_dump($jmlh_pesanan);
                // var_dump($total_harga_pesanan);
                // var_dump($tgl_pesanan);
                // var_dump($alamat);
                // var_dump($gambar);
                // die();

                $query = "UPDATE orders 
                          SET
                          id_plg               = '$nama_pemesan',
                          id_barang            =  '$nama_barang',
                          jmlh_pemesan         =  '$jmlh_pesanan',
                          total_harga_pesanan  = '$total_harga_pesanan',
                          tgl_pesanan          = '$tgl_pesanan',
                          alamat               = '$alamat',
                          id_barang            = '$gambar'
                          WHERE id_pesanan     = '$id_pesanan'";
                      

                if ($query) {
        
                  echo "<script>
                              alert('Data Update Success');
                              window.location=('data_pesanan.php');
                  </script>";
      
                } else {
                    echo "Failed Update Data" . mysqli_error($koneksi);
                }
                
               
                // $sql = "UPDATE cusromes SET 
                // nama_plg = '$nama_pemesan',
                // gambar = '$gambar'
                //     WHERE id_pesanan = '$id_pesanan'";

                // $query = mysqli_query($koneksi, $sql);

                // $sql = "UPDATE goods SET nama_barang = '$nama_barang'
                //     WHERE id_pesanan = '$id_pesanan'";

                // $query = mysqli_query($koneksi, $sql);

                // $sql = "UPDATE orders SET 
                //     jmlh_pesanan = '$jmlh_pesanan',
                //     total_harga_pesanan = '$total_harga_pesanan',
                //     tgl_pesanan = '$tgl_pesanan',
                //     alamat = '$alamat'
                //     WHERE id_pesanan = '$id_pesanan'";

                // $query = mysqli_query($koneksi, $sql);

                // if ($query) {
        
                //   echo "<script>
                //               alert('data berhasil di update');
                //               window.location=('data_pesanan.php');
                //   </script>";
      
                // } else {
                //     echo "gagal" . mysqli_error($koneksi);
                // }
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