<?php 
    include('koneksi.php');    
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $data=mysqli_query($koneksi,"select * from tbl_kasir where username='$username' AND password_real='$password'");
    
    $num_row=mysqli_num_rows($data);
    if($num_row>=1){
        echo "success";
    }else
    {
        echo "failed";
    }
?>