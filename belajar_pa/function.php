<?php
    include('koneksi.php');

    if(isset($_POST['submit'])){
        $id = $_POST['id_barang'];
        $nama = $_POST['nama_barang'];
        $jenis = $_POST['jenis_barang'];
        $stok = $_POST['stok_barang'];
        $status = $_POST['status_barang'];
     
        //upload gambar
        $gambar = upload();
        if( !$gambar){
          return false;
        }
     
        $create = mysqli_query($koneksi,"INSERT INTO goods VALUES(
           '".$id."',
           '".$nama."',
           '".$jenis."',
           '".$stok."',
           '".$status."',
           '".$gambar."'
     
        )");
     
        if($create){
           ?>
           <script>
             alert("Data Added Sucessfully");
             window.location=('tampilan.php');
           </script>
           <?php
        } else {
           echo "Failed Being Added" . mysqli_error($koneksi);
        }
     }
?>