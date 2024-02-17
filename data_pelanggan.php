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
            <div class="col-md-4">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">DATA PELANGGAN</h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <form id="form_input">
             
                  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Nama Pelanggan</label>
                          <input type="text" name="nama_pelanggan" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" name="alamat" class="form-control">
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">No Handphone</label>
                          <input type="text" name="no_handphone" class="form-control">
                        </div>
                      </div>
                    </div>
                 
                   
                    <button type="button" id="tombol_simpan" onclick="md.showNotification('top','right')" class="btn btn-primary pull-right">Simpan</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-8">
           
              <div class="card card-profile">
                <div class="card-avatar">
                 <br>
                </div>
                <div class="card-body">
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
            tampil_data();
        });
         function tampil_data(){
            $.ajax({
                url:'api_select_pelanggan.php',
                type:'get',
                success: function(data){
                    $('#tampil_data').html(data);
                }
            })
        }

        $("#tombol_simpan").click(function () {
                            $.ajax({
                              type: 'POST',
                                      url: "api_simpan_pelanggan.php",
                                         data: $('#form_input').serialize(),
                                         success: function () {
                                             //setelah simpan data, update data terbaru
                                             tampil_data()
                                         }
                             });
                          return false;
                     });

                     $(document).on('click', '.hapus_data', function(){ 
                    var id = $(this).attr('id');
                    
                    $.ajax({
                    type: 'POST',
                    url: "api_delete_pelanggan.php",
                    data: {id:id}, 
                    success: function(response) { 
                        //setelah simpan data, update data terbaru
                    tampil_data() 
                    }
                    });
                    });
        </script>