<?php 

include_once("./header.php");

//Belirli veriyi seçme işlemi
$siparisdetaysor=$db->prepare("SELECT * FROM siparis_detay WHERE siparis_id = ?");
$siparisdetaysor->execute([$_GET["siparisid"]]);


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Sifariş Listələmə<small>

       
  

            </small></h2>
          
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
               

       

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Tarix</th>
                  <th>Məhsulun Adı</th>
                  <th>Məhsulun Sayı</th>
                  <th>Tutar</th>
                  <th>Ödəmə Tipi</th>
                </tr>
              </thead>

              <tbody>

                <?php 
                $say = 0;
                while($siparisdetaysorcek=$siparisdetaysor->fetch(PDO::FETCH_ASSOC)) {$say++;
                  $siparisSor = $db->prepare("SELECT * FROM siparis WHERE siparis_id = ?");
                  $siparisSor->execute([$siparisdetaysorcek["siparis_id"]]);
                  $siparisler = $siparisSor->fetch(PDO::FETCH_ASSOC);
                  $urunleriSorgula = $db->prepare("SELECT * FROM urunler WHERE urun_id = ?");
                  $urunleriSorgula->execute([$siparisdetaysorcek["urun_id"]]);
                  $urun = $urunleriSorgula->fetch(PDO::FETCH_ASSOC);
                  $toplam = $urun["urun_fiyat"] * $siparisdetaysorcek["urun_adet"];?>
               

                <tr>
                  <td width="20" td><?php echo $say ?></td>
                  <td><?php echo $siparisler['siparis_zaman'] ?></td>
                  <td><?php echo $urun["urun_ad"] ?></td>
                  <td><?php echo $siparisdetaysorcek["urun_adet"] ?></td>
                  <td><?php echo $toplam ?></td>
                  <td><?php echo $siparisler["siparis_tip"] ?></td>
                
                  
                </tr>
                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php require_once("footer.php"); ?>
