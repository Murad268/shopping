<?php include 'header.php' ?>

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
		<div class="title">Ödəmə Səhifəsi</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Məhsul Şəkil</th>
					<th>Məhsul ad</th>
					<th>Məhsul Kodu</th>
					<th>Ədəd</th>
					<th>Toplam Qiymət</th>
				</tr>
			</thead>
			<tbody>


				<?php 
			
				$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
				$sepetsor->execute(array(
					'id' => $user_id
					));
				$urun_ids = "";
				$urunAdedleri = '';
				$toplam_fiyat = 0;
				while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {
					$urun_id=$sepetcek['urun_id'];
					$urunsor=$db->prepare("SELECT * FROM urunler where urun_id=:urun_id");
					$urunsor->execute(array(
						'urun_id' => $urun_id
						));

					$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
				
					$toplam_fiyat += $uruncek['urun_fiyat']*$sepetcek['urun_adet'];
						
					$urun_ids.=$uruncek["urun_id"]." ";
			
					?>	
				
					<tr>
						<td><img src="images\demo-img.jpg" width="100" alt=""></td>
						<td><?php echo $uruncek['urun_ad'] ?></td>
						<td><?php echo $uruncek['urun_id'] ?></td>
						<td><form><?php echo $sepetcek['urun_adet'] ?></form></td>
						<td><?php echo $uruncek['urun_fiyat'] ?></td>
					</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col-md-6">


			</div>
			<div class="col-md-3 col-md-offset-3">
				<div class="subtotal-wrap">
					<!--<div class="subtotal">
						<<p>Toplam Fiyat : $26.00</p>
						<p>Vat 17% : $54.00</p>
					</div>-->
               <div style="margin-left: -40px" class="total">Toplam Qiymət : <span style="margin-left: 10px" class="bigprice"><?php echo $toplam_fiyat ?> TL</span></div>
					<div class="clearfix"></div>
					<!-- <a href="" class="btn btn-default btn-yellow">Ödeme Sayfası</a> -->
				</div>
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="tab-review">
			<ul id="myTab" class="nav nav-tabs shop-tab">

				<li class="active"><a href="#desc" data-toggle="tab">Kredit Kartı</a></li>
				<li><a href="#rev" data-toggle="tab">Bank köçürməsi </a></li>
			</ul>




			<div id="myTabContent" class="tab-content shop-tab-ct">
				

				<div class="tab-pane fade active in" id="desc">
					<p>
                  İnteqrasiya Tamamlanmadı.
					</p>
				</div>


				<div class="tab-pane fade " id="rev">

					<form action="nedmin/netting/islem.php" method="post">

						<p>Ödənişi həyata keçirəcəyiniz hesab nömrəsini seçməklə əməliyyatı tamamlayın. <br> IBAN nömrəsini bir yerə qeyd etməyi unutmayın!</p>
		


						<?php 
						$bankasor=$db->prepare("SELECT * FROM banka WHERE banka_durum = '1' order by banka_id ASC");
						$bankasor->execute();
						$say = 0;
						while($bankacek=$bankasor->fetch(PDO::FETCH_ASSOC)) { ?>
					
						
						<input <?=$say==0?"checked":null?> type="radio" name="banka_ad" value="<?php echo $bankacek['banka_ad'] ?>">
						<?php echo $bankacek['banka_ad'].'<b>/IBAN nömrəsi: '.$bankacek['banka_iban'].'</b>';?><br>

						<?php
							$say++;
						?>
						<input type="hidden" value="<?=$toplam_fiyat?>" name="siparis_toplam">
						<input name="urun_ids" type="hidden" value="<?=$urun_ids?>">
	
						<?php  } ?>
						<hr>
						<button class="btn btn-success" type="submit" name="bankasipariskaydet">Sifariş Ver</button>

					</form>

				</div>


			</div>
		</div>
		<div class="spacer"></div>
	</div>

	<?php include 'footer.php' ?>