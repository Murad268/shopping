<?php
require_once("header.php");
?>
<div class="col-md-3"><!--sidebar-->
				<div class="title-bg">
					<div class="title">Kateqoriyalar</div>
				</div>
				
				<div class="categorybox">
					<ul>
						<?php
							$kategoriyalariAlSorgusu = $db->prepare("SELECT * FROM categories");
							$kategoriyalariAlSorgusu->execute();
							$kagetoriler = $kategoriyalariAlSorgusu->fetchAll(PDO::FETCH_ASSOC);
							$kategoriSayi = $kategoriyalariAlSorgusu->rowCount();
							if($kategoriSayi>0) {
								foreach($kagetoriler as $kategori) {?>
										<li><a href="kategori-<?=seo($kategori["category_ad"])?>"><?=$kategori["category_ad"]?></a></li>
								<?php
								} 
							} else {
								echo "Heç bir kateqoriya yoxdur.";
							}
						?>
				
					
					</ul>
				</div>
				
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