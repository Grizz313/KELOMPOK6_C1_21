<?php
session_start();
if (!isset($_SESSION["login_admin"])) {
  header("Location: login_admin.php");
}
     include('koneksi.php');

   if(isset($_GET['id_barang'])){
      $delete = mysqli_query($koneksi, "DELETE FROM goods WHERE id_barang= '".$_GET['id_barang']."'");

      if($delete){
         ?>
            <script>
            alert("Data Item Deleted Successfully");
            window.location=('tampilan_barang.php');
            </script>
         <?php
      }
   }
?>