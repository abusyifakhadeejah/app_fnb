<?php 
    include('koneksi.php');    
    $id_menu= $_POST['id'];
    $jumlah_beli = $_POST['jumlah'];
    $id_pemesanan = '1';
    $harga =  $_POST['harga'];
    $total_harga = $harga*$jumlah_beli;
    //cek jumlah
    $data=mysqli_query($koneksi,"select * from tbl_rincian where id_menu='$id_menu' ");
    while($d=mysqli_fetch_array($data)){
        $jumlah_awal=$d['jumlah_beli'];
    }
    $num_row=mysqli_num_rows($data);
    if($num_row>=1){
        $upjumlah_beli=$jumlah_awal+$jumlah_beli;
        mysqli_query($koneksi,"update tbl_rincian set jumlah_beli='$upjumlah_beli' where id_menu=' $id_menu' ");
    }else
    {
        $upjumlah_beli=$jumlah_beli;
        mysqli_query($koneksi,"insert into tbl_rincian values('','$id_menu','$upjumlah_beli','$id_pemesanan','$harga','$total_harga')");
    }
    //jika ada
    
 
?>