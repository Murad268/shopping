<?php 

include 'header.php'; 
	
if (isset($_GET['sef'])) {

	$adres = 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
	$url = substr(explode("?", $adres)[0], 27);

	$kategorisor=$db->prepare("SELECT * FROM categories where category_seourl=:seourl");
	$kategorisor->execute(array(
		'seourl' => $_GET['sef']
		));

	$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

	$kategori_id=$kategoricek['category_id'];


	$sayfalamaIcinButonSayisi = 2;
	$sayfaBasinaGosterilecek = 1;
	$toplamKayitSayisiSorgusu = $db->prepare("SELECT * from urunler where kategori_id=:kategori_id");;
	$toplamKayitSayisiSorgusu->execute(array(
		'kategori_id' => $kategori_id
		));

	$toplamKayitSayisi = $toplamKayitSayisiSorgusu->rowCount();
	$sayfalamayBaslayacaqKayotSayisi = ($sayfalama*$sayfaBasinaGosterilecek) - $sayfaBasinaGosterilecek;
	$bulunanSafyaSayisi = ceil($toplamKayitSayisi/$sayfaBasinaGosterilecek);

	$kategori = $kategoricek["category_ad"];
	$urunsor=$db->prepare("SELECT * FROM urunler where kategori_id=:kategori_id order by urun_id DESC LIMIT 	 $sayfalamayBaslayacaqKayotSayisi, $sayfaBasinaGosterilecek");
	$urunsor->execute(array(
		'kategori_id' => $kategori_id
		));

	$say=$urunsor->rowCount();
	echo "<head>
				<title>$kategori</title>
			</head>";
} else {
	$sayfalamaIcinButonSayisi = 2;
	$sayfaBasinaGosterilecek = 6;
	$toplamKayitSayisiSorgusu = $db->prepare("select * from urunler");;
	$toplamKayitSayisiSorgusu->execute();
	$toplamKayitSayisi = $toplamKayitSayisiSorgusu->rowCount();
	$sayfalamayBaslayacaqKayotSayisi = ($sayfalama*$sayfaBasinaGosterilecek) - $sayfaBasinaGosterilecek;
	$bulunanSafyaSayisi = ceil($toplamKayitSayisi/$sayfaBasinaGosterilecek);
	$urunsor=$db->prepare("SELECT * FROM urunler order by urun_id DESC LIMIT $sayfalamayBaslayacaqKayotSayisi, $sayfaBasinaGosterilecek");
	$urunsor->execute();
   $say=$urunsor->rowCount();
	echo "<head>
				<title>Kateqoriyalar</title>
			</head>";
			
	$adres = $_SERVER['REQUEST_URI'];
	$url = substr(explode("?", $adres)[0], 27);
	echo $url;
}




?>



<div class="container">

	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	
	<div class="row">
		<div class="col-md-9">
			<div class="title-bg">
				<div class="title">Məhsullar</div>
			
			</div>
			<div class="row prdct">


				<?php
				
				if ($say==0) {
					echo "Bu kateqoriyada məhsul tapılmadı";
				}

				$uruncek=$urunsor->fetchAll(PDO::FETCH_ASSOC);
				foreach($uruncek as $urunler) {
						$resimleregit = $db->prepare("SELECT * FROM urunfoto WHERE urun_id = ?");
						$resimleregit->execute([$urunler["urun_id"]]);
						$resim = $resimleregit->fetch(PDO::FETCH_ASSOC);
						$resimsayi=$resimleregit->rowCount();
						if($resimsayi>0) {
							$img = $resim["urun_fotoresimyol"];
						} else {
							$img = "./dimg/resimyok.png";
						}
					?>

					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<?php
									if($urunler["discount"]>30) {?>
									<div class="hot"></div>
									<?php
									}
								?>
								<a href="urun-<?=seo($urunler["urun_ad"]).'-'.$urunler["urun_id"]?>"><img style="height: 150px; width: 200px" src="<?=$img?>" alt="" class="img-responsive"></a>
								<?php
									if($urunler["discount"]) {?>
										<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span style="color: red" class="oldprice"><?php echo $urunler['urun_fiyat'] ?>TL</span><?php echo round($urunler['urun_fiyat']-($urunler['urun_fiyat']*$urunler['discount']/100), 2) ?><span style="color: blue;" >TL</span></span></div></div>
									<?
									} else {?>
									<div class="pricetag"><div class="inner"><?=$urunler["urun_fiyat"]?></div></div>
									<?php
									}
								?>
								
							</div>
							<span class="smalltitle"><a href="product.htm"><?php echo substr($urunler['urun_ad'] , 0, 15)?></a></span>
							<span class="smalldesc">Məhsul Kodu.: <?php echo $urunler['urun_id'] ?></span>
						</div>
					</div>


					<?php } ?>




								



				
                     </div><!--Products-->
							<?php
									if($bulunanSafyaSayisi>1) {?>
										<div style="width: 700px; margin-left: 170px" class="paginationWrapper">
											<nav aria-label="Page navigation example ">
											<ul class="pagination">
												<li class="page-item"><a class="page-link" href="<?=$url?>?sayfalama=1<?$sayfalamaKosulu?>">&laquo;</a></li>
													<?php
														for($i = $sayfalama-$sayfalamaIcinButonSayisi; $i <= $sayfalama+$sayfalamaIcinButonSayisi; $i++) {
															if(($i > 0) and ($i <= $bulunanSafyaSayisi)) {
																$curr = $i;
															if($sayfalama == $i) {
																echo "<li style=\"cursor: pointer\" class=\"page-item\"><a style=\"background: red; color: white;\" class=\"page-link\">$curr</a></li>";
															} else {
																echo "<li class=\"page-item\"><a class=\"page-link\" href=\"$url?sayfalama=$curr\">$curr</a></li>";
															}
														}
													}
													?>
													
													<li class="page-item"><a class="page-link"  href="<?=$url?>?sayfalama=<?=$bulunanSafyaSayisi?>">&raquo;</a></li>
												</ul>
											</nav>
										</div>
									<?php
									}
								?>	

<!-- 
				<ul class="pagination shop-pag">
					<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">5</a></li>
					<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
				</ul> -->

			</div>

			<?php include 'sidebar.php' ?>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php include 'footer.php'; ?>