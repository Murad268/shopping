
<?php 
	include 'header.php';
   $sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
   $sepetsor->execute(array(
      'id' => $user_id
      ));
   $toplam_fiyat = 0;
   $sepetSayi = $sepetsor->rowCount();
?>
<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>
	<div class="title-bg">
		<div class="title">Alışveriş Səbətim</div>
	</div>

 
	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
         <?php
            if($sepetSayi>0) {?>
            <tr>
					<th>Sil</th>
					<th>Məhsul Şəkil</th>
					<th>Məhsul ad</th>
					<th>Məhsul Kodu</th>
					<th>Ədəd</th>
					<th>Toplam Qiymət</th>
				</tr>
            <?php
            } else {
               echo "Səbətiniz boşdur";
            }
         ?>
			
			</thead>

			<tbody>
            <?php
           
				while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {

					$urun_id=$sepetcek['urun_id'];
					$urunsor=$db->prepare("SELECT * FROM urunler where urun_id=:urun_id");
					$urunsor->execute(array(
						'urun_id' => $urun_id
						));

					$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
					$toplam_fiyat+=$uruncek['urun_fiyat']*$sepetcek['urun_adet'];
					?>

					<tr>
						<td><form><input type="checkbox"></form></td>
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad'] ?></td>
						<td><?php echo $uruncek['urun_id'] ?></td>
						<td><form><input type="text" class="form-control quantity" value="<?php echo $sepetcek['urun_adet'] ?>"></form></td>
						<td><?php echo $uruncek['urun_fiyat'] ?></td>
					</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-6">


			</div>
         <?php
            if($sepetSayi > 0) {?>
            	<div class="col-md-3 col-md-offset-3">
                  <div class="subtotal-wrap">
                     <!--<div class="subtotal">
                        <<p>Toplam Fiyat : $26.00</p>
                        <p>Vat 17% : $54.00</p>
                     </div>-->
                     <div style="margin-left: -40px" class="total">Toplam Qiymət : <span style="margin-left: 10px" class="bigprice"><?php echo $toplam_fiyat ?> TL</span></div>
                     <div class="clearfix"></div>
                     <a href="odeme.php" class="btn btn-default btn-yellow">Ödəmə Səhifəsi</a>
                  </div>
                  <div class="clearfix"></div>
               </div>
            <?php
            }
         ?>
		</div>
		<div class="spacer"></div>
	</div>

	<?php include 'footer.php' ?>