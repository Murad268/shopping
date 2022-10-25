<?php 

include_once("./header.php");

//Belirli veriyi seçme işlemi
$sepetsor=$db->prepare("SELECT * FROM sepet WHERE kullanici_id = ?");
$sepetsor->execute([$_GET["user_id"]]);


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
            <?php 
              if(isset($_GET['durum'])) {
                if ($_GET['durum']=="ok") {?>

                  <b style="color:green;">Əməliyyat Uğurludu...</b>
    
                  <?php } elseif ($_GET['durum']=="no") {?>
    
                  <b style="color:red;">Əməliyyat Uğursuzdu...</b>
    
                  <?php }
              }
              

              ?>
       
  

            </small></h2>
          
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
               

       

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Məhsul Şəkil</th>
                  <th>Məhsul ad</th>
                  <th>Məhsul Kodu</th>
                  <th>Ədəd</th>
                  <th>Toplam Qiymət</th>
                  <th></th>
                  
             
                </tr>
              </thead>

              <tbody>

                <?php 
 
                $toplam_fiyat = 0;
                while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {
                  $urun_id=$sepetcek['urun_id'];
                  $urunsor=$db->prepare("SELECT * FROM urunler where urun_id=:urun_id");
                  $urunsor->execute(array(
                     'urun_id' => $urun_id
                     ));
   
                  $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
                  $toplam_fiyat+=$uruncek['urun_fiyat']*$sepetcek['urun_adet'];?>
                     <td><img src="images\demo-img.jpg" width="100" alt=""></td>
                     <td><?php echo $uruncek['urun_ad'] ?></td>
                     <td><?php echo $uruncek['urun_id'] ?></td>
                     <td> <?php echo $sepetcek['urun_adet'] ?></td>
                     <td><?php echo $uruncek['urun_fiyat'] ?></td>
                     <td><center><a href="../netting/islem.php?sepetsil=ok&sepetid=<?=$sepetcek['sepet_id']?>&user_id=<?=$_GET["user_id"]?>"><button class="btn btn-primary btn-xs">Sil</button></a></center></td>
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
