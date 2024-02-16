<?php 
    include('koneksi.php');    
    $id_menu= $_POST['id_menu'];
    $jumlah_beli = $_POST['jumlah_pesan'];
    $id_pemesanan = '1';
    $harga = 10000;
    $total_harga = $harga*$jumlah_beli;
    //cek jumlah
    
    //jika ada
    mysqli_query($koneksi,"insert into tbl_rincian values('','$id_menu','$jumlah_beli','$id_pemesanan','$harga','$total_harga')");
 
?>