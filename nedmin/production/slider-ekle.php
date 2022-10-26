<?php 

include 'header.php'; 

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Slayd Əlavə Etmək <small>,

           
                <?php
                if(isset($_GET["durum"])) {
                  if($_GET["durum"] == "empty") {?>
                  <b style="padding: 10px; background: black; color: yellow">Hər Hansısa məlumat və ya bütün məlmatlar boş göndərilib.</b>
                  <?php
                  } else if($_GET["durum"] == "ok") {?>
                      <b style="padding: 10px; background: black; color: green">Məlumatlar uğurla yeniləndilər.</b>
                  <?php
                  } else if($_GET["durum"] == "error"){?>
                      <b style="padding: 10px; background: black; color: red">Məlumatların yenilənməsi zamanı xəta.</b>
                  <?php
                  } else if($_GET["durum"] == "bigsize") {?>
                    <b style="padding: 10px; background: black; color: red">Şəklin ölçüsü 1 mbdan çox olmamalıdır.</b>
                  <?php
                  } else if($_GET["durum"] == "wrongformat") {?>
                    <b style="padding: 10px; background: black; color: yellow">Düzgün şəkil formatı deyil(icaze verilən formatlar: jpeg, jpg, png).</b>
                  <?php
                  } else {?>
                    <b style="padding: 10px; background: black; color: blue">Heç bir məlumat yenilənmədi.</b>
                  <?php
                  }
                }
                ?>
                </small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Hansı Məhsula aiddir<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="urun_id" required>
                <?php
                  $urunleriSorgula = $db->prepare("SELECT * FROM urunler");
                  $urunleriSorgula->execute();
                  $urunler = $urunleriSorgula->fetchAll(PDO::FETCH_ASSOC);
                  foreach($urunler as $urun) {?>
                    <option value="<?=$urun["urun_id"]?>"><?=$urun["urun_ad"]?></option>
                  <?php
                  }
                ?>


                 
                 </select>
               </div>
             </div>
              <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="slider_resimyol"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Ad <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="slider_ad"  required="required" placeholder="Slider adını daxil edin" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider detay <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea name="slider_detay" class="form-control col-md-7 col-xs-12"></textarea>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Url <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="slider_link"   placeholder="Slider Link daxil edin" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Sıra <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="slider_sira"  required="required" placeholder="Slider sıra daxil edin"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>





              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Slider Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="slider_durum" required>

                  <option value="1" >Aktif</option>
                  <option value="0" >Pasif</option>
                  


                </select>
              </div>
            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="sliderkaydet" class="btn btn-success">Kaydet</button>
              </div>
            </div>

          </form>



        </div>
      </div>
    </div>
  </div>



  <hr>
  <hr>
  <hr>



</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
