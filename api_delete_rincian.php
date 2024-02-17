<?php 
    include('koneksi.php');    
    $id = $_POST['id'];
    mysqli_query($koneksi,"delete from tbl_rincian where id_rincian='$id'");
 
?>