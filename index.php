
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
					foreach($uruncek as $urun) {?>
							<div class="item">
								<div class="productwrap">
									<div class="pr-img">
										<div class="hot"></div>
										<a href="urun-<?=seo($urun["urun_ad"]).'-'.$urun["urun_id"]?>"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
										<div class="pricetag blue"><div class="inner"><span>$<?=$urun["urun_fiyat"]?></span></div></div>
									</div>
										<span class="smalltitle"><a href="urun-<?=seo($urun["urun_ad"]).'-'.$urun["urun_id"]?>"><?=$urun["urun_ad"]?></a></span>
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
				<a href="about" class="btn btn-default btn-red btn-sm">Read More</a>
				
				<div class="title-bg">
					<div class="title">Lastest Products</div>
				</div>
				<div class="row prdct"><!--Products-->
					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<a href="product.htm"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice">$314</span>$199</span></div></div>
							</div>
							<span class="smalltitle"><a href="product.htm">Black Shoes</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag"><div class="inner">$199</div></div>
						</div>
							<span class="smalltitle"><a href="product.htm">Nikon Camera</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag"><div class="inner">$199</div></div>
						</div>
							<span class="smalltitle"><a href="product.htm">Red T- Shirt</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag"><div class="inner">$199</div></div>
						</div>
							<span class="smalltitle"><a href="product.htm">Nikon Camera</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-2.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag"><div class="inner">$199</div></div>
						</div>
							<span class="smalltitle"><a href="product.htm">Black Shoes</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
					<div class="col-md-4">
						<div class="productwrap">
						<div class="pr-img">
							<a href="product.htm"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
							<div class="pricetag"><div class="inner">$199</div></div>
						</div>
							<span class="smalltitle"><a href="product.htm">Red T-Shirt</a></span>
							<span class="smalldesc">Item no.: 1000</span>
						</div>
					</div>
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