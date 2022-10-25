<?php 

include_once("./header.php");

//Belirli veriyi seçme işlemi
$resimsor=$db->prepare("SELECT * FROM urunfoto");
$resimsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Rəsim Listləmə <small>

       
            <?php
               if(isset($_GET["status"])) {
                  if($_GET["status"] == "empty") {?>
                  <b style="color: blue">Hər Hansısa məlumat və ya bütün məlmatlar boş göndərilib.</b>
                  <?php
                  } else if($_GET["status"] == "ok") {?>
                     <b style="color: green">Menyu uğurla əlavə edildi.</b>
                  <?php
                  } else {?>
                     <b style="color: red">Məlumatların əlavəsi zamanı xəta.</b>
                  <?php
                  }
               }
               ?>

            </small></h2>
          
            <div class="clearfix"></div>
           
          </div>
          <div class="x_content">
               

            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Məhsulun Adı</th>
                  <th>Məhsulun Rəsmi</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 
     
                while($resimcek=$resimsor->fetch(PDO::FETCH_ASSOC)) {
                  $urunleregit = $db->prepare("SELECT * FROM urunler WHERE urun_id = ?");
                  $urunleregit->execute([$resimcek["urun_id"]]);
                  $urun = $urunleregit->fetch(PDO::FETCH_ASSOC);
                  ?>
               

                <tr>
                  <td width="20" td><img width="100px" src="../../<?=$resimcek["urun_fotoresimyol"]?>" alt=""></td>
                  <td><?php echo $urun["urun_ad"] ?></td>
                  <td><center><a href="../production/resim-guncelle?resimid=<?=$resimcek['urunfoto_id']?>"><button class="btn btn-primary btn-xs">Yenilə</button></a></center></td>
             
                  <td><center><a href="../netting/islem.php?urunresimsil=ok&resimid=<?=$resimcek['urunfoto_id']?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
