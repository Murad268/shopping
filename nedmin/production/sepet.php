<?php 

include_once("./header.php");

//Belirli veriyi seçme işlemi
$usersor=$db->prepare("SELECT * FROM users");
$usersor->execute();


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

       
  

            </small></h2>
          
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
               

       

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>İstifadəçi Kodu</th>
                  <th>İstifadəçi Adı</th>
                  <th>İstifadəçi Poçtu</th>
                  <th></th>
                  
             
                </tr>
              </thead>

              <tbody>

                <?php 
                $say = 0;
                while($usercek=$usersor->fetch(PDO::FETCH_ASSOC)) {$say++;?>
                <tr>
                  <td width="20" td><?php echo $usercek['user_id'] ?></td>
                  <td><?php echo $usercek['user_name']?></td>
                  <td><?php echo $usercek['user_email']?></td>
                  <td><center><a href="sepetone.php?user_id=<?=$usercek['user_id']?>"><button class="btn btn-primary btn-xs">Səbətə get</button></a></center></td>
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
