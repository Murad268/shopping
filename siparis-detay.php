<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Sifariş Bilgilərim</div>
							<p >Vermiş olduğunuz sifarişləri listələyirsiniz</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-12">
				<div class="title-bg">
					<div class="title">Sifariş Bilgiləri</div>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered chart">
						<thead>
							<tr>
						
								<th>Sipariş No</th>
								<th>Tarix</th>
								<th>Tutar</th>
								<th>Ödəmə Tipi</th>
								<th>Durum</th>
								<th></th>
								
							</tr>
						</thead>
						<tbody>
                     <?php
                        $siparisDetaySor = $db->prepare("SELECT * FROM siparis_detay WHERE siparis_id = ?");
                        $siparisDetaySor->execute([$_GET["no"]]);
                        $siparisDetay = $siparisDetaySor->fetchAll(PDO::FETCH_ASSOC);
                        foreach($siparisDetay as $siparis) {
										$siparisSor = $db->prepare("SELECT * FROM siparis WHERE siparis_id = ?");
										$siparisSor->execute([$siparis["siparis_id"]]);
										$siparisler = $siparisSor->fetch(PDO::FETCH_ASSOC);
										$urunleriSorgula = $db->prepare("SELECT * FROM urunler WHERE urun_id = ?");
										$urunleriSorgula->execute([$siparis["urun_id"]]);
										$urun = $urunleriSorgula->fetch(PDO::FETCH_ASSOC);
										$toplam = $urun["urun_fiyat"] * $siparis["urun_adet"];
										if($siparisler["siparis_odeme"] == "0") {
											$durum = "Gözləmədə";
										} else {
											$durum = "Ödənilib";
										}
								?>
                        	<tr>
                           <td><?=$siparisler["siparis_id"]?></td>
                           <td><?=$siparisler["siparis_zaman"]?></td>
                           <td><?=$toplam?></td>
                           <td><?=$siparisler["siparis_banka"]?></td>
									<td><?=$durum?></td>
									<td><a href=""><button class="btn btn-primary btn-xs">Detallar</button></a></td>
                           </tr>
                        <?php
                        }
                     ?>
						

						</tbody>
					</table>
				</div>

				


				


				


				
			</div>
			
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>