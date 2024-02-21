<table class='table table-hover'>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Menu</th>
            <th>Jumlah Beli</th>
            <th>Harga</th>
            <th>Harga Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
            include "koneksi.php";
            $no=1;
            $tanggal=date('Y-m-d');
            $total=0;
            $data=mysqli_query($koneksi, "SELECT * FROM tbl_menu,tbl_rincian WHERE tbl_menu.id_menu=tbl_rincian.id_menu AND status='dibayar' AND tgl_pesan='$tanggal' ");
            while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['nama_menu']; ?></td>
                    <td><?php echo $d['jumlah_beli']; ?></td>
                    <td><?php echo number_format($d['harga'],0); ?></td>
                    <td><?php echo number_format($d['total_harga'],0); ?></td>
                </tr>
                <?php
                $total=$total+$d['total_harga'];
            }
        ?>
    </tbody>
</table>
<h3>TOTAL PENJUALAN : <?php echo number_format($total,0);?></h3>