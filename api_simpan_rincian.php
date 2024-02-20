<?php 
    include('koneksi.php');    
    $id_menu= $_POST['id'];
    $jumlah_beli = $_POST['jumlah'];
    $id_pemesanan = '1';
    $harga =  $_POST['harga'];
   
    //cek jumlah
    $data=mysqli_query($koneksi,"select * from tbl_rincian where id_menu='$id_menu' AND status='dipesan' ");
    while($d=mysqli_fetch_array($data)){
        $jumlah_awal=$d['jumlah_beli'];
       
    }
    $num_row=mysqli_num_rows($data);

    if($num_row>=1){
        $upjumlah_beli=$jumlah_awal+$jumlah_beli;
        $total_harga = $harga*$upjumlah_beli;
        mysqli_query($koneksi,"update tbl_rincian set jumlah_beli='$upjumlah_beli',total_harga='$total_harga' where id_menu=' $id_menu' ");
    }else
    {
        $upjumlah_beli=$jumlah_beli;
        $total_harga = $harga*$upjumlah_beli;
        mysqli_query($koneksi,"insert into tbl_rincian values('','$id_menu','$upjumlah_beli','$id_pemesanan','$harga','$total_harga','dipesan')");
    }
    //jika ada
    
 
?>