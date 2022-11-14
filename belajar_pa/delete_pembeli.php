<?php
session_start();
if (!isset($_SESSION["login_admin"])) {
  header("Location: login_admin.php");
}
     include('koneksi.php');

   if(isset($_GET['id'])){
      $delete = mysqli_query($koneksi, "DELETE FROM customers WHERE id_plg = '".$_GET['id']."'");

      if($delete){
         ?>
            <script>
            alert("Data Customer Deleted Successfully");
            window.location=('data_pembeli.php');
            </script>
         <?php
      }
   }
?>