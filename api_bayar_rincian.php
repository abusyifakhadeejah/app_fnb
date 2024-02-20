<?php 
    include('koneksi.php');    

    mysqli_query($koneksi,"update tbl_rincian set status='dibayar'");
 
?>