<?php 
    include('koneksi.php');    
    $id = $_POST['id'];
    mysqli_query($koneksi,"delete from tbl_pelanggan where id_pelanggan='$id'");
 
?>