<?php 

include 'header.php';


?>






<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">


    </div>

    <div class="col-md-12">
      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

          <form action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control" name="aranan" placeholder="Anahtar Kelime Giriniz...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="arama">Axtar!</button>
              </span>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>Çoxsaylı şəkil yükləmələri</h2>

                      <div align="right" class="col-md-9">
                     
                      <a class="btn btn-success" href="urun-galeri.php"><i class="fa fa-plus" aria-hidden="true"></i> Yüklənmiş Şəkilləri Gör</a>
                      </div>

                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <p>Siz yüklənəcək şəkillərin olduğu qovluğa keçib, hamısını birdən seçib yükləyə bilərsiniz.</p>
                      

                      <form action="../netting/urungaleri.php" class="dropzone" >

                        <input type="hidden" name="urun_id" value="<?php echo $_GET['urun_id'];  ?>">
                        <button class="btn btn-success" style="position: absolute; bottom: -120px; left: 450px; cursor: pointer">Göndər</button>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>



          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</div>
<!-- /page content -->

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

<?php include 'footer.php'; ?>
