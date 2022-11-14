<?php
session_start();
if (!isset($_SESSION["login_admin"])) {
  header("Location: login_admin.php");
}
     include('koneksi.php');

   if(isset($_GET['id'])){
      $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id_users = '".$_GET['id']."'");

      if($delete){
         ?>
            <script>
            alert("Data Admin Deleted Successfully");
            window.location=('data_admin.php');
            </script>
         <?php
      }
   }
?>