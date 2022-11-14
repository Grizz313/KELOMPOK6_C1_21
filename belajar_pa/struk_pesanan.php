<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="struk1.css">
    <title>Order Receipt</title>

</head>
<body>
    <?php 

            session_start();
            include('koneksi.php');
            if (!isset($_SESSION["login_pembeli"])) {
            header("Location: login_pembeli.php");
            exit;
            }
            //   //  $barang = query("SELECT * FROM goods");
            $tampil = mysqli_query($koneksi, "SELECT * FROM orders 
            INNER JOIN customers on orders.id_plg  =  customers.id_plg
            INNER JOIN goods on orders.id_barang  =  goods.id_barang
            WHERE orders.id_plg = '" . $_SESSION['id_plg'] . "'
            order by id_pesanan asc");
    ?>

    <?php
         if (mysqli_num_rows($tampil) > 0) {
            while ($row = mysqli_fetch_array($tampil)) {
            $pesanan = $row['jmlh_pesanan'];
            $total = $pesanan * $row['harga_barang'];
    ?>
    <div class="container">

        <div class="profile">

        <img src="img/<?php echo $row['gambar']; ?>" width="100 px" alt="" srcset="">
        <h1>Customers:</h1>
        <div class = "goback-btn2"><?php echo $row['nama_plg']; ?></div>
        <h1>Item: </h1>
        <div class = "goback-btn2"><?php echo $row['nama_barang']; ?></div>
        <h1>Order Quantity: </h1>
        <div class = "goback-btn2"><?php echo $row['jmlh_pesanan']; ?></div>
        <h1>Alamat: </h1>
        <div class = "goback-btn2"><?php echo $row['alamat']; ?></div>
        <h1>Order Time: </h1>
        <div class = "goback-btn2"><?php echo $row['tgl_pesanan']; ?></div>
        <h1>Total Price: </h1>
        <div class = "goback-btn2"><?php echo $row['total_harga_pesanan']; ?></div>        
        <br>
        <br>
        <br>
        <br>
        <a href="home_pembeli.php" class="goback-btn" style="text-decoration:none">Go Back</a>
    </div>
        </div>
    <?php
            }
        }

        
    ?>
</body>
</html>