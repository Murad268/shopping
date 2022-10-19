<?php 

include_once("./header.php");

//Belirli veriyi seçme işlemi
$menyusor=$db->prepare("SELECT * FROM menuler");
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
            <h2>Menyu Listeleme <small>,

       
            <?php
               if(isset($_GET["status"])) {
                  if($_GET["status"] == "empty") {?>
                  <b style="color: blue">Hər Hansısa məlumat və ya bütün məlmatlar boş göndərilib.</b>
                  <?php
                  } else if($_GET["status"] == "ok") {?>
                     <b style="color: green">Məlumatlar uğurla yeniləndilər.</b>
                  <?php
                  } else {?>
                     <b style="color: red">Məlumatların silinməsi zamanı xəta.</b>
                  <?php
                  }
               }
               ?>

            </small></h2>
          
            <div class="clearfix"></div>
            <div align="right">
               <a href="kullanici-ekle">
                  <button class="btn btn-success btn-xs">Yeni Menyu Əlavə Elə</button>
               </a>
            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Menyu Adı</th>
                  <th>Menyu Url</th>
                  <th>Menyu Sıra</th>
                  <th>Menyu Durum</th>
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
                  <td><?php echo $menyucek['menu_ad'] ?></td>
                  <td><?php echo $menyucek['menu_url'] ?></td>
                  <td><?php echo $menyucek['menu_sira'] ?></td>
                  <td>
                     <?php
                        if($menyucek['menu_durum'] == 1) {?>
                           <button class="btn btn-success btn-xs">Aktiv</button>
                        <?php
                        } else {?>
                           <button class="btn btn-danger btn-xs">Passiv</button>
                        <?php
                        }
                     ?>
                  </td>
                  <td><center><a href="user-update.php?userid=<?=$kullanicicek['user_id']?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?userid=<?=$kullanicicek['user_id']?>&kullanicisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
