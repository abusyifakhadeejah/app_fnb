<?php 
    include('koneksi.php');    
    $id = $_POST['id_menu'];
    $jumlah_beli = $_POST['jumlah_beli'];
    $id_pemesanan = '1';
    $harga = $_POST['harga'];
    $total_harga = $harga*$jumlah_beli;
    //cek jumlah
    
    //jika ada
    mysqli_query($koneksi,"insert into tbl_rincian values('','$nama_kasir','$alamat','$no_handphone')");
 
?>