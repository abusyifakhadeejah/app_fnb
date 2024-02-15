
<?php
            include "koneksi.php";
            $no=1;
            $data=mysqli_query($koneksi, "SELECT * FROM tbl_menu WHERE kategori='minuman'");
            while($d=mysqli_fetch_array($data)){
                ?>
                <div class="col-md-3">
                    <div class="card card-profile">
                        <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="assets/img/<?php echo $d['foto']; ?>" />
                        </a>
                        </div>
                        <div class="card-body">
                        <h6 class="card-category"><?php echo $d['nama_menu']; ?></h6>
                        <h4 class="card-title"><?php echo $d['harga_jual']; ?></h4>
                        <p class="card-description">
                        <?php echo $d['kategori']; ?>
                        </p>
                        <a href="#pablo" id="<?php echo $d['id_menu']; ?>" class="btn btn-success pesan">Pesan</a>
                        </div>
                    </div>
                </div>

                <?php
            }
        ?>
