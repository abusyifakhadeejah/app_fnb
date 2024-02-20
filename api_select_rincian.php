<hr>
<div id="displayTotal" style="font-size:28px;color:white;">TOTAL</div><button id="btnBayar" class="btn btn-primary btn-md">Bayar</button>
<hr>
<div id="panelBayar" hidden="hidden">
<h3 style="color:white;" id="sisaBayar"></h3>
<label>jumlah Bayar</label><input type="text" id="jumlahBayar" onkeyup="hitung_kembalian()" />

<button class="btn btn-primary btn-block" onclick="bayar_nota()">Cetak Nota</button>
</div>
<table class='table table-hover table-responsive'>
    <thead>
        <tr>
        <th></th>
            <th>Jml</th>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Total</th>
        </tr>
        
    </thead>
    <tbody>
        <?php
            include "koneksi.php";
            $total_nota=0;
            $no=1;
            $data=mysqli_query($koneksi, "SELECT * FROM tbl_rincian,tbl_menu WHERE tbl_menu.id_menu = tbl_rincian.id_menu AND tbl_rincian.status='dipesan'");
            while($d=mysqli_fetch_array($data)){
                ?>
                <tr>
                <td><button id="<?php echo $d['id_rincian']; ?>" class="btn btn-danger btn-sm hapus_rincian">x</button></td>
                <td><?php echo $d['jumlah_beli']; ?></td>
                    <td><?php echo $d['nama_menu']; ?></td>
                    <td><?php echo $d['harga']; ?></td>
                    <td><?php echo $d['total_harga']; ?></td>
                </tr>
                <?php
                $total_nota=$total_nota+$d['total_harga'];
            }
        ?>
    </tbody>
</table>
<input type="hidden" id="totalNota" value="<?php echo $total_nota ?>"/>

