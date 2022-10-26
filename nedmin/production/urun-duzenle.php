<?php 

include 'header.php'; 


$urunsor=$db->prepare("SELECT * FROM urunler where urun_id=:id");
$urunsor->execute(array(
  'id' => $_GET['urun_id']
  ));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

?>


<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Məshul Yeniləmə <small>

              <?php 

               if(isset($_GET["durum"])) {
                  if ($_GET['durum']=="ok") {?>

                     <b style="color:green;">İşlem Başarılı...</b>
       
                     <?php } elseif ($_GET['durum']=="no") {?>
       
                     <b style="color:red;">İşlem Başarısız...</b>
       
                     <?php }
               }

              ?>


            </small></h2>
           
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />


            <form action="../netting/islem.php" method="POST" id="menuekleform" data-parsley-validate class="form-horizontal form-label-left">



          

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

               
                    <select class="select2_multiple form-control" required="" name="kategori_id">
                        <?php
                           $kategorilericek = $db->prepare("SELECT * FROM categories");
                           $kategorilericek->execute();
                           $kategoriler = $kategorilericek->fetchAll(PDO::FETCH_ASSOC);
                           $kategorisayi = $kategorilericek->rowCount();
                           $kategoriListi = listing($kategoriler);
                           function listed($el) {
                            global $kategorisayi;
                            global $uruncek;
                            if($kategorisayi>0) {
                              foreach($el as $kategori) {
                                if(!empty($kategori["children"])){;?>
                                
                                <optgroup label="<?=$kategori["category_ad"]?>"></optgroup>
                           
                               
                              <?php
                              listed($kategori["children"]);
                              } else {?>
                                <option <?=$kategori["category_id"]==$uruncek["kategori_id"]?"selected":null?> value="<?=$kategori["category_id"]?>">&nbsp; &nbsp; <?=$kategori["category_ad"]?></option>
                              <?php
                             
                              }
                           }
                           }
                          }
                           listed($kategoriListi)
                        ?>

               

                     </select>
                   </div>
                 </div>





                 <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məhsul Adı <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="urun_ad" value="<?php echo $uruncek['urun_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

       

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məhsul Haqqında <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <textarea style="height: 100px" class="form-control col-md-7 col-xs-12" id="editor1" name="urun_detay"><?php echo $uruncek['urun_detay']; ?></textarea>
                  </div>
                </div>

               


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məhsul Qiyməti <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_fiyat" value="<?php echo $uruncek['urun_fiyat'] ?>"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mıshul Video Linki<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_video" value="<?php echo $uruncek['urun_video'] ?>" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məhsul Keyword <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_keyword" value="<?php echo $uruncek['urun_keyword'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məshul Stoku <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="urun_stok" value="<?php echo $uruncek['urun_stok'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məhsulu Öne Çıxart<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="urun_onecikar" required>
                  <option value="1" <?php echo $uruncek['urun_onecikar'] == '1' ? 'selected=""' : ''; ?>>Bəli</option>
                  <option value="0" <?php if ($uruncek['urun_onecikar']==0) { echo 'selected=""'; } ?>>Xeyr</option>
                 </select>
               </div>
             </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Məshul Durum<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="urun_durum" required>

                  <option value="1" <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($uruncek['urun_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                 </select>
               </div>
             </div>
             <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Endirim Faizi <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="discount" value="<?php echo $uruncek['discount'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>

             <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="urunduzenle" class="btn btn-success">Yenilə</button>
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
<script src="../../js/script.js"></script>
<?php include 'footer.php'; ?>
