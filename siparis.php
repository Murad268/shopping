<?php include 'header.php'; 
         $siparisSor = $db->prepare("SELECT * FROM siparis WHERE kullanici_id = ?");
			$siparisSor->execute([$user_id]);
			$siparisler = $siparisSor->fetchAll(PDO::FETCH_ASSOC);
			$siparisSayi = $siparisSor->rowCount();
			if($siparisSayi>0) {?>
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
											<th>Detallar</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
								
											foreach($siparisler as $siparis) {?>
												<tr>
												<td><?=$siparis["siparis_id"]?></td>
												<td><?=$siparis["siparis_zaman"]?></td>
												<td><?=$siparis["siparis_toplam"]?></td>
												<td><a href="siparis-detay.php?no=<?=$siparis["siparis_id"]?>"><button class="btn btn-primary btn-xs">Detallar</button></a></td>
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

			<div class="spacer"></div>
			<?php
			} else {?>
			<div style="text-align: center; margin: 20px">Hələ ki, heç bir sifarişiniz yoxdur</div>
			<?php
				
			}
?>
			


</div>

<?php include 'footer.php'; ?>