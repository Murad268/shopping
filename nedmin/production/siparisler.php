<?php 

include_once("./header.php");

//Belirli veriyi seçme işlemi
$menyusor=$db->prepare("SELECT * FROM siparis");
$menyusor->execute();


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
                  <th>S.No</th>
                  <th>Tarix</th>
                  <th>Tutar</th>
                  <th></th>
                  <th></th>
             
                </tr>
              </thead>

              <tbody>

                <?php 
                $say = 0;
                while($menyucek=$menyusor->fetch(PDO::FETCH_ASSOC)) {$say++;?>


                <tr>
                  <td width="20" td><?php echo $say ?></td>
                  <td><?php echo $menyucek['siparis_zaman'] ?></td>
                  <td><?php echo $menyucek['siparis_toplam'] ?></td>
             
                
                  <td><center><a href="siparis-detay.php?siparisid=<?=$menyucek['siparis_id']?>"><button class="btn btn-primary btn-xs">Detallar</button></a></center></td>
                  <td><center><a href="../netting/islem.php?siparissil=ok&siparisid=<?=$menyucek['siparis_id']?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
