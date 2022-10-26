<div class="col-md-3"><!--sidebar-->
	<div class="title-bg">
		<div class="title">Kategoriler</div>
	</div>
	
	<div class="categorybox">
		
		<ul>
			
				<?php 

	//bütün kayıtları bir kereye mahsus olmak üzere listeliyoruz; daha doğrusu, bir diziye aktarmak için verileri çekiyoruz

				$query = "SELECT * FROM categories order by category_id ";
				$goster = $db->prepare($query);
				$goster->execute(); //queriyi tetikliyor

				$toplamSatirSayisi = $goster->rowCount(); //malumunuz üzere sorgudan dönen satır sayısını öğreniyoruz
				
				$tumSonuclar = $goster->fetchAll(); //DB'deki bütün satırları ve sutunları $tumSonuclar değişkenine dizi şeklinde aktarıyoruz

				$altKategoriSayisi = 0;
				for ($i = 0; $i < $toplamSatirSayisi; $i++) {
					if ($tumSonuclar[$i]['category_ust'] == "0") {
						$altKategoriSayisi++;
					}
				}
				for ($i = 0; $i < $toplamSatirSayisi; $i++) {
					if ($tumSonuclar[$i]['category_ust'] == "0") {
						kategori($tumSonuclar[$i]['category_id'], $tumSonuclar[$i]['category_ad'], $tumSonuclar[$i]['category_ust']);
					}
				}
				function kategori($kategori_id, $kategori_ad, $kategori_ust) {
					global $tumSonuclar;
					global $toplamSatirSayisi;
					//kategorinin, alt kategori sayısını öğreniyoruz:
					$altKategoriSayisi = 0;
					for ($i = 0; $i < $toplamSatirSayisi; $i++) {
						if ($tumSonuclar[$i]['category_ust'] == $kategori_id) {
							$altKategoriSayisi++;
						}
					}
					?>
					<li>
						<a href="kategori-<?=seo($kategori_ad) ?>"><?php echo $kategori_ad ?></a>
						<?php 
						if ($altKategoriSayisi > 0) {
							echo "( $altKategoriSayisi )";
						}
						?>
					</a>
					<?php
					if ($altKategoriSayisi > 0) { //alt kategorisi varsa onları da listele
						echo "<ul>";
						for ($i = 0; $i < $toplamSatirSayisi; $i++) {
							if ($tumSonuclar[$i]['category_ust'] == $kategori_id) {
								kategori($tumSonuclar[$i]['category_id'], $tumSonuclar[$i]['category_ad'], $tumSonuclar[$i]['category_ust']);
							}
						}
						echo "</ul>";
					}
					?>
				</li> 
				<?php 
				}
				?>
		</ul>
	</div>



	<!-- Kategoriler yukarıda -->

	<div class="ads">
		<a href="product.htm"><img src="images\ads.png" class="img-responsive" alt=""></a>
	</div>

	<div class="title-bg">
		<div class="title">Best Seller</div>
	</div>
	<div class="best-seller">
		<ul>
			<li class="clearfix">
				<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
				<div class="mini-meta">
					<a href="#" class="smalltitle2">Panasonic M3</a>
					<p class="smallprice2">Price : $122</p>
				</div>
			</li>
			<li class="clearfix">
				<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
				<div class="mini-meta">
					<a href="#" class="smalltitle2">Panasonic M3</a>
					<p class="smallprice2">Price : $122</p>
				</div>
			</li>
			<li class="clearfix">
				<a href="#"><img src="images\demo-img.jpg" alt="" class="img-responsive mini"></a>
				<div class="mini-meta">
					<a href="#" class="smalltitle2">Panasonic M3</a>
					<p class="smallprice2">Price : $122</p>
				</div>
			</li>
		</ul>
	</div>

			</div><!--sidebar-->