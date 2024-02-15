<!DOCTYPE html>
<html lang="en" >
 
<head>
 
  <meta charset="UTF-8">
  <title>Template Faktur Untuk Kasir HTML</title>
 
  <link rel="stylesheet" href="assets/css/struk.css">
 
  <script>
  window.console = window.console || function(t) {};
</script>
 
 
 
  <script>
  if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>
 
 
</head>
 
<body translate="no" >
 
 
  <div id="invoice-POS">
 
    <center id="top">
      <div class="logo"></div>
      <div class="info"> 
        <h2>Cafe </h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
 
    <div id="mid">
      <div class="info">
        <h2>Info Kontak</h2>
        <p> 
           Alamat : Pekanbaru RIAU</br>
            Email  : xxxxxx@gmail.com</br>
            Telephone   : 08521361xxxx</br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
 
    <div id="bot">
 
                    <div id="table">
                        <table>
                            <tr class="tabletitle">
                                <td class="item"><h2>Item</h2></td>
                                <td class="Hours"><h2>Qty</h2></td>
                                <td class="Rate"><h2>Sub Total</h2></td>
                            </tr>
 
                            <tr class="service">
                                <td class="tableitem"><p class="itemtext">Roti Panggang</p></td>
                                <td class="tableitem"><p class="itemtext">5</p></td>
                                <td class="tableitem"><p class="itemtext">Rp5.000,-</p></td>
                            </tr>
 
                            <tr class="service">
                                <td class="tableitem"><p class="itemtext">Kacang Goreng</p></td>
                                <td class="tableitem"><p class="itemtext">2</p></td>
                                <td class="tableitem"><p class="itemtext">Rp2.500,-</p></td>
                            </tr>
 
                            <tr class="service">
                                <td class="tableitem"><p class="itemtext">Cokelat Kacang</p></td>
                                <td class="tableitem"><p class="itemtext">1</p></td>
                                <td class="tableitem"><p class="itemtext">Rp2.500,-</p></td>
                            </tr>
 
                            <tr class="service">
                                <td class="tableitem"><p class="itemtext">Kertas Karton</p></td>
                                <td class="tableitem"><p class="itemtext">5</p></td>
                                <td class="tableitem"><p class="itemtext">Rp1.000,-</p></td>
                            </tr>
 
                            <tr class="tabletitle">
                                <td></td>
                                <td class="Rate"><h2>Total</h2></td>
                                <td class="payment"><h2>Rp37.500,-</h2></td>
                            </tr>
 
                        </table>
                    </div><!--End Table-->
 
                    <div id="legalcopy">
                        <p class="legal"><strong>Terimakasih Telah Berbelanja!</strong>  Barang yang sudah dibeli tidak dapat dikembalikan. Jangan lupa berkunjung kembali
                        </p>
                    </div>
 
                </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
 
</body>
 
</html>