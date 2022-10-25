<?php 

include 'header.php'; 

if (isset($_GET['sef'])) {


	$kategorisor=$db->prepare("SELECT * FROM categories where category_seourl=:seourl");
	$kategorisor->execute(array(
		'seourl' => $_GET['sef']
		));

	$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

	 $kategori_id=$kategoricek['category_id'];


	$urunsor=$db->prepare("SELECT * FROM urunler where kategori_id=:kategori_id order by urun_id DESC");
	$urunsor->execute(array(
		'kategori_id' => $kategori_id
		));

	$say=$urunsor->rowCount();

} else {

	$urunsor=$db->prepare("SELECT * FROM urunler order by urun_id DESC");
	$urunsor->execute();
   $say=$urunsor->rowCount();
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
				<div class="title-nav">
					<a href="javascripti:void(0);"><i class="fa fa-th-large"></i>grid</a>
					<a href="javascripti:void(0);"><i class="fa fa-bars"></i>List</a>
				</div>
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
								<div class="hot"></div>
								<a href="urun-<?=seo($urunler["urun_ad"]).'-'.$urunler["urun_id"]?>"><img style="height: 150px" src="<?=$img?>" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span style="color: red" class="oldprice"><?php echo $urunler['urun_fiyat']*1.50 ?> TL</span><?php echo $urunler['urun_fiyat'] ?><span style="color: blue;" >TL</span></span></div></div>
							</div>
							<span class="smalltitle"><a href="product.htm"><?php echo substr($urunler['urun_ad'] , 0, 30)?></a></span>
							<span class="smalldesc">Məhsul Kodu.: <?php echo $urunler['urun_id'] ?></span>
						</div>
					</div>


					<?php } ?>





				</div><!--Products-->

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