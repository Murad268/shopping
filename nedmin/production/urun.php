<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$urunsor=$db->prepare("SELECT * FROM urunler order by urun_id DESC");
$urunsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Məhsul Listləmə <small>

              <?php 

              if(isset($_GET["durum"])) {
               if ($_GET['durum']=="ok") {?>

                  <b style="color:green;">Əməliyyat Uğurludu...</b>
    
                  <?php } elseif ($_GET['durum']=="no") {?>
    
                  <b style="color:red;">Əməliyyat Uğursuzdu...</b>
    
                  <?php }
              }

              ?>


            </small></h2>

            <div class="clearfix"></div>

            <div align="right">
              <a href="urun-ekle.php"><button class="btn btn-success btn-xs"> Yenisini Əlavə Elə</button></a>

            </div>
          </div>
          <div class="x_content">


          

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Məhsul Adı</th>
                  <th>Məhsul Stoku</th>
                  <th>Məhsul Qiyməti</th>
                  <th>Məshul Durum</th>
                  <th>Məhsulu Öne Çıxarmaq</th>
                  <th>Rəsim İşləmləri</th>
                  <th></th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo substr($uruncek['urun_ad'], 0, 21)."</br>".substr($uruncek['urun_ad'], 21) ?></td>
                 <td><?php echo $uruncek['urun_stok'] ?></td>
                 <td><?php echo $uruncek['urun_fiyat'] ?></td>

                 <td><center><?php 

                  if ($uruncek['urun_durum']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>


                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>
            <?php
              if($uruncek['urun_onecikar'] == 1) {?>
               <td><center><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&məhsuluonecikar=no"><button class="btn btn-danger btn-xs">Məhsulu Önə Çıxarma</button></a></center></td>
              <?php
              } else {?>
               <td><center><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&məhsuluonecikar=ok"><button class="btn btn-primary btn-xs">Məhsulu Önə Çıxar</button></a></center></td>
              <?php
              }
            ?>
            <td><center><a href="urun-foto-yukle.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-primary btn-xs">Yüklə</button></a></center></td>
            <td><center><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-primary btn-xs">Yenilə</button></a></center></td>
            <td><center><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
          </tr>



          <?php  }

          ?>


        </tbody>
      </table>




    </div>
  </div>
</div>
</div>




</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
