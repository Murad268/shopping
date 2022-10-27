<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$categorysor=$db->prepare("SELECT * FROM newsregister ORDER BY durum");
$categorysor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategoriyaları Listləmə <small>

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
              <a href="kategori-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Email</th>
                  <th>Bildiriş Tarixi</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($categorycek=$categorysor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $categorycek['email'] ?></td>
                 <td><?php echo $categorycek['date'] ?></td>

                 <td><center><?php 

                  if ($categorycek['durum']=="1") {?>

                  <button class="btn btn-success btn-xs">Oxunmuş</button>

                

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Gözləyən</button>


                <?php } ?>
              </center>


            </td>

            <?php
               if($categorycek['durum'] == '1') {?>
                  <td><center><a href="../netting/islem.php?mess_id=<?=$categorycek['id']?>&mesdeyis=no"><button class="btn btn-primary btn-xs">Oxunmamış olaraq qeyd et</button></a></center></td>
               <?php
               } else {?>
                  <td><center><a href="../netting/islem.php?mess_id=<?=$categorycek['id']?>&mesdeyis=ok"><button class="btn btn-primary btn-xs">Oxunmuş olaraq qeyd et</button></a></center></td>
               <?php
               }
            ?>
            
            <td><center><a href="../netting/islem.php?mess_id=<?=$categorycek['id']?>&messil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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

<?php include 'footer.php'; ?>
