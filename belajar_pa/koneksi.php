<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "belajar_pa";
    
    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $row = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $row[] = $row;
        }
        return $row;
    }

    // function cari($keyword){
    //     global $koneksi;
    //     // mysqli_query($koneksi, "SELECT * FROM goods order by id_barang asc");
    //     $query = mysqli_query($koneksi, "SELECT * FROM goods
    //               WHERE
    //               nama_barang LIKE '%$keyword%'
    //               ");

       
    //     $data = query($query);
    //     // var_dump($data);
    // }
    
   
?>
