<?php
    include "header.php";
?>
<body class="dark-edition">
  <div class="wrapper ">
  <?php
            include "sidebar.php";
        ?>
    <div class="main-panel">
      <!-- Navbar -->
      <?php
            include "menu.php";
        ?>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-profile">
                <div class="card-avatar">
                 <br>
                </div>
                <div class="card-body">
                  <h3>Laporan Penjualan Harian</h3>
                
                  <div id="tampil_data"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
      <?php
            include "footer.php";
        ?>
        <script>
            $(document).ready(function(){
              tampil_laporan_rincian();
        });

          function tampil_laporan_rincian(){
            $.ajax({
                url:'api_select_laporan.php',
                type:'get',
                success: function(data){
                    $('#tampil_data').html(data);
                }
            })
          }
        </script>