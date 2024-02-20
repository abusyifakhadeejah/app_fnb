
<?php
    include "header.php";
?>
<body class="dark-edition">
  <div class="wrapper" >
 
      <!-- Navbar -->
      <?php
            include "menu.php";
        ?>
      <!-- End Navbar -->
      <div class="row" >
                  <div class="col-md-6 ml-auto mr-auto text-center">
                    <h4 class="card-title" style="margin-top:20px;" >
                      Silahkan pilih menu
                    </h4>
                  </div>
                </div>
               
      <div class="content" style="margin-top:20px;">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-3" id="tampil_rincian">
           
            </div>
            
            <div class="col-md-9">
            <div class="row" style="margin-bottom:30px;">
                  <div class="col-lg-8 col-md-10 ml-auto mr-auto">
                    <div class="row">
                    <div class="col-md-3">
                        <button class="btn btn-primary btn-block" onclick="tampil_data()">Semua</button>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-primary btn-block" onclick="tampil_data_makanan()">Makanan</button>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-primary btn-block" onclick="tampil_data_minuman()" >Minuman</button>
                      </div>
                      <div class="col-md-3">
                        <button class="btn btn-primary btn-block" onclick="tampil_data_camilan()" >Camilan</button>
                      </div>
                    </div>
                  </div>
                </div>
            <div class="row"  id="tampil_data">

         
            </div>
            </div>
        </div>
      
        </div>
      </div>


     

      <?php
            include "footer.php";
        ?>
        
        <?php
            include "rincian_pesan.php";
        ?>

        <script>
         $(document).ready(function(){
            tampil_data();
            tampil_rincian();
        });
         function tampil_data(){
            $.ajax({
                url:'api_select_menu.php',
                type:'get',
                success: function(data){
                  console.log(data);
                    $('#tampil_data').html(data);
                }
            })
        }

        function tampil_data_makanan(){
            $.ajax({
                url:'api_select_makanan.php',
                type:'get',
                success: function(data){
                  console.log(data);
                    $('#tampil_data').html(data);
                }
            })
        }

        function tampil_data_minuman(){
            $.ajax({
                url:'api_select_minuman.php',
                type:'get',
                success: function(data){
                  console.log(data);
                    $('#tampil_data').html(data);
                }
            })
        }

        function tampil_data_camilan(){
            $.ajax({
                url:'api_select_camilan.php',
                type:'get',
                success: function(data){
                  console.log(data);
                    $('#tampil_data').html(data);
                }
            })
        }

        function tampil_rincian(){
            $.ajax({
                url:'api_select_rincian.php',
                type:'get',
                success: function(data){
                   $('#tampil_rincian').html(data);
                    totalNota=$('#totalNota').val();
                    $('#displayTotal').html('TOTAL NOTA : '+totalNota);
                }
            })
        }


        $(document).on('click', '.hapus_rincian', function(){ 
                    var id = $(this).attr('id');
                    $.ajax({
                    type: 'POST',
                    url: "api_delete_rincian.php",
                    data: {id:id}, 
                    success: function(response) { 
                        //setelah simpan data, update data terbaru
                    tampil_rincian(); 
                    }
              });
          });

          $(document).on('click', '#btnBayar', function(){ 
             $('#btnBayar').attr('hidden','hidden');
             $('#panelBayar').removeAttr('hidden');
          });


        $(document).on('click', '.pesan', function(){ 
          var id = $(this).attr('id');
          var harga = $(this).attr('harga');
          var jumlah = $(this).attr('jumlah');
          
          $.ajax({
          method:"POST",
          url: "api_simpan_rincian.php",
          data:{id:id,harga:harga,jumlah:jumlah}, 
          success: function(data){

            tampil_rincian();
          /*if(data === 'success') {
              window.location.href="dashboard.php";
          } else {
            md.showLoginNotification('top','left');
          }*/
          
      }});
      });

      function hitung_kembalian()
      {
        totalNota=$('#totalNota').val();
        jumlahBayar=$('#jumlahBayar').val();
        $('#sisaBayar').html('KEMBALI : '+(jumlahBayar-totalNota));
      }
        </script>