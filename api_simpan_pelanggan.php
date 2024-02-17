<?php
    include ('koneksi.php');
    $nama_pelanggan=$_POST['nama_pelanggan'];
    $alamat=$_POST['alamat'];
    $no_handphone=$_POST['no_handphone'];

    mysqli_query($koneksi,"insert into tbl_pelanggan values('','$nama_pelanggan','','$no_handphone','$alamat')");
?>