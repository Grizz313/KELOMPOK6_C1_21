<?php
// session_start();
// if (!isset($_SESSION["login_admin"])) {
//   header("Location: login_admin.php");
// }
     include('koneksi.php');

   if(isset($_GET['id'])){
      $delete = mysqli_query($koneksi, "DELETE FROM orders WHERE id_pesanan = '".$_GET['id']."'");

      if($delete){
         ?>
            <script>
            alert("Data Order Deleted Successfully");
            window.location=('data_pesanan.php');
            </script>
         <?php
      }
   }
?>