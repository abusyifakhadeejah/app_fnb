<?php 
    include('koneksi.php');    
    $username='kasir1';
    $password=md5('agos145');

    $data=mysqli_query($koneksi,"select * from tbl_kasir where username='$username' AND password_real='$password'");
    
    $num_row=mysqli_num_rows($data);
    if($num_row>=1){
        echo "login berhasil";
    }else
    {
        echo "login gagal";
    }
?>