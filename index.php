
<?php
	require_once("header.php");
?>
	<div class="container">
	
		<div class="clearfix"></div>
		<div class="lines"></div>
		<?php require_once("carusel.php")?>
		
	</div>
	<div class="f-widget featpro">
		<div class="container">
			<div class="title-widget-bg">
				<div class="title-widget">Önə Çıxan Məhsullar</div>
				<div class="carousel-nav">
					<a class="prev"></a>
					<a class="next"></a>
				</div>
			</div>
			<div id="product-carousel" class="owl-carousel owl-theme">
				<?php
					$urunsor=$db->prepare("SELECT * FROM urunler WHERE urun_durum = '1' and urun_onecikar = '1'");
					$urunsor->execute();
					$uruncek=$urunsor->fetchAll(PDO::FETCH_ASSOC);
					foreach($uruncek as $urun) {
						$resimleregit = $db->prepare("SELECT * FROM urunfoto WHERE urun_id = ?");
						$resimleregit->execute([$urun["urun_id"]]);
						$resim = $resimleregit->fetch(PDO::FETCH_ASSOC);
						$resimsayi=$resimleregit->rowCount();
						if($resimsayi>0) {
							$img = $resim["urun_fotoresimyol"];
						} else {
							$img = "./dimg/resimyok.png";
						}?>
							<div class="item">
								<div class="productwrap">
									<div class="pr-img">
										<?php
										if($urun["discount"]>30) {?>
										<div class="hot"></div>
										<?php
										}
									  ?>
									  <a href="urun-<?=seo($urun["urun_ad"]).'-'.$urun["urun_id"]?>"><img style="height: 150px; width: 200px"  src="<?=$img?>" alt="" class="img-responsive"></a>
										<?php
											if($urun["discount"]) {?>
												<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span style="color: red" class="oldprice"><?php echo $urun['urun_fiyat'] ?>TL</span><?php echo round($urun['urun_fiyat']-($urun['urun_fiyat']*$urun['discount']/100), 2) ?><span style="color: blue;" >TL</span></span></div></div>
											<?
											} else {?>
											<div class="pricetag"><div class="inner"><?=$urun["urun_fiyat"]?></div></div>
											<?php
											}
										?>
									</div>
										<span class="smalltitle"><a href="urun-<?=seo($urun["urun_ad"]).'-'.$urun["urun_id"]?>"><?=substr($urun["urun_ad"], 0, 15)?></a></span>
										<span class="smalldesc">Ürün Kodu.: <?=$urun["urun_id"]?></span>
								</div>
							</div>
					<?php
					}
					
				?>
		
		
			</div>
		</div>
	</div>
	
	
	
	<div class="container">
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title">Haqqımızda</div>
				</div>
				<p class="ct">
					<?=substr($about_desc, 0, 500)?>
				</p>
				<a href="about" class="btn btn-default btn-red btn-sm">Davamını oxu</a>
				
				<div class="title-bg">
					<div class="title">Ən son Məhsullar</div>
				</div>
				<div class="row prdct">
					<?php
						$mehsullariaxtar = $db->prepare("SELECT * FROM urunler ORDER BY urun_id DESC LIMIT 6");
						$mehsullariaxtar->execute();
						$mehsullar = $mehsullariaxtar->fetchAll(PDO::FETCH_ASSOC);
						foreach($mehsullar as $mehsul) {
							$resimleregit = $db->prepare("SELECT * FROM urunfoto WHERE urun_id = ?");
							$resimleregit->execute([$mehsul["urun_id"]]);
							$resim = $resimleregit->fetch(PDO::FETCH_ASSOC);
							$resimsayi=$resimleregit->rowCount();
							if($resimsayi>0) {
								$img = $resim["urun_fotoresimyol"];
							} else {
								$img = "./dimg/resimyok.png";
							}?>
								
							<div class="col-md-4">
								<div class="productwrap">
									<div class="pr-img">
										<?php
											if($mehsul["discount"]>30) {?>
											<div class="hot"></div>
											<?php
											}
										?>
										<a href="urun-<?=seo($mehsul["urun_ad"]).'-'.$mehsul["urun_id"]?>"><img style="height: 150px; width: 200px" src="<?=$img?>" alt="" class="img-responsive"></a>
										<?php
											if($mehsul["discount"]) {?>
												<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span style="color: red" class="oldprice"><?php echo $mehsul['urun_fiyat'] ?>TL</span><?php echo round($mehsul['urun_fiyat']-($mehsul['urun_fiyat']*$mehsul['discount']/100), 2) ?><span style="color: blue;" >TL</span></span></div></div>
											<?
											} else {?>
											<div class="pricetag"><div class="inner"><?=$mehsul["urun_fiyat"]?></div></div>
											<?php
											}
										?>
										
									</div>
									<span class="smalltitle"><a href="product.htm"><?php echo substr($mehsul['urun_ad'] , 0, 15)?></a></span>
									<span class="smalldesc">Məhsul Kodu.: <?php echo $mehsul['urun_id'] ?></span>
								</div>
							</div>
						<?php
						}
					?>
				
					
			
				
				</div><!--Products-->
				<div class="spacer"></div>
			</div><!--Main content-->
			<?php
			require_once("sidebar.php")
			?>
		</div>
	</div>
	
<?php
	require_once("footer.php");
?>