<?php 

include_once("./header.php");

//Belirli veriyi seçme işlemi
$kullanicisor=$db->prepare("SELECT * FROM users");
$kullanicisor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>İstifadəçiləri Listləmə <small>,

       
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
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>Kayıt Tarih</th>
                  <th>Ad Soyad</th>
                  <th>Mail Adresi</th>
                  <th>Telefon</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $kullanicicek['user_date'] ?></td>
                  <td><?php echo $kullanicicek['user_name'] ?></td>
                  <td><?php echo $kullanicicek['user_email'] ?></td>
                  <td><?php echo $kullanicicek['user_gsm'] ?></td>
                  <?php
                    if($kullanicicek['user_id'] !== $ADMIN["user_id"]) {?>
                     <td><center><a href="user-update.php?userid=<?=$kullanicicek['user_id']?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                     <td><center><a href="../netting/islem.php?userid=<?=$kullanicicek['user_id']?>&kullanicisil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                    <?php
                    } else {?>
                       <td><center><button disabled class="btn btn-primary btn-xs">Düzenle</button></center></td>
                       <td><center><button disabled class="btn btn-primary btn-xs">Sil</button></center></td>
                    <?}
                  ?>
                 
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
