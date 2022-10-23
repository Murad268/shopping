<?php 

include 'header.php'; 

$url = 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$urunsor=$db->prepare("SELECT * FROM urunler where urun_id=:urun_id");
$urunsor->execute(array(
	'urun_id' => $_GET['urun_id']
	));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

$say=$urunsor->rowCount();

if ($say==0) {
	
	header("Location:index.php?durum=oynasma");
	exit;
}
$yorumlarisorgula = $db->prepare("SELECT * FROM yorumlar WHERE urun_id = ?");
$yorumlarisorgula->execute([$_GET['urun_id']]);
$yorumlar = $yorumlarisorgula->fetchAll(PDO::FETCH_ASSOC);
$yorumSayi = $yorumlarisorgula->rowCount();
?>

<head>
	
	<!-- fancy Style -->
	<link rel="stylesheet" type="text/css" href="js\product\jquery.fancybox.css?v=2.1.5" media="screen">
</head>
<?php 
   if(isset($_GET["durum"])) {
      if ($_GET['durum']=="ok") {?>

         <script type="text/javascript">
            alert("Şərh uğurla əlavə edildi");
         </script>
         
         <?php }
   }
	if(isset($_GET["del"])) {
      if ($_GET['del']=="ok") {?>

         <script type="text/javascript">
            alert("Şərh uğurla silindi");
         </script>
         
         <?php }
   }
?>
<div class="container">
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
	</div>
	<div class="row">
		<div class="col-md-9">
			<div class="title-bg">
				<div class="title"><?php echo $uruncek['urun_ad'] ?></div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="dt-img">
						<div class="detpricetag"><div class="inner"><?php echo $uruncek['urun_fiyat'] ?> TL</div></div>
						<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="thumb-img">
						<a class="fancybox" href="images\sample-4.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-4.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="thumb-img">
						<a class="fancybox" href="images\sample-5.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-5.jpg" alt="" class="img-responsive"></a>
					</div>
					<div class="thumb-img">
						<a class="fancybox" href="images\sample-1.jpg" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="images\sample-1.jpg" alt="" class="img-responsive"></a>
					</div>
				</div>
				<div class="col-md-6 det-desc">
					<div class="productdata">
						<div class="infospan">Ürün Kodu <span><?php echo $uruncek['urun_id']; ?></span></div>
						<div class="infospan">Məhsulun Qyməti <span><?php echo $uruncek['urun_fiyat']; ?></span></div>




						<div class="clearfix"></div>
						<hr>


						<form action="nedmin/netting/islem.php" method="POST">

						<div class="form-group">
							<label for="qty" class="col-sm-2 control-label">Ədəd</label>
							<div class="col-sm-4">
								<input type="text" class="form-control" value="1" name="urun_adet">
							</div>
							<input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kullanici_id'] ?>">

							<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
							<div class="col-sm-4">
								<button type="submit" name="sepetekle" class="btn btn-default btn-red btn-sm"><span class="addchart">Səbətə Əlavə Elə</span></button>
							</div>
							<div class="clearfix"></div>
						</div>

						</form>

						<div class="sharing">
							<div class="share-bt">
								<div class="addthis_toolbox addthis_default_style ">
									<a class="addthis_counter addthis_pill_style"></a>
								</div>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=xa-4f0d0827271d1c3b"></script>
								<div class="clearfix"></div>
							</div>


					
							<div  class="avatock"><span>

								<?php if ($uruncek['urun_stok']>=1) {

									echo "Stok Adeti : ".$uruncek['urun_stok'];
								} else {

									echo "Ürün Kalmadı";
								} ?>

							</span></div>
						</div>



					</div>
				</div>
			</div>

			<div class="tab-review">
				<ul id="myTab" class="nav nav-tabs shop-tab">
					<li class="<?php
						if(empty($_GET["durum"])) {
							echo "active";
						}
					?>"><a href="#desc" data-toggle="tab">Açıqlama</a></li>
					<li class="<?php
						if(isset($_GET["durum"])) {
							echo "active";
						}
					?>"><a href="#rev" data-toggle="tab">Şərhlər (<?=$yorumSayi?>)</a></li>
					<li class=""><a href="#video" data-toggle="tab">Məhsul Videosu</a></li>
				</ul>
				<div id="myTabContent" class="tab-content shop-tab-ct">
					<div class="tab-pane fade <?php
						if(empty($_GET["durum"])) {
							echo "active in";
						}
					?> in" id="desc">
						<p>
							<?php echo $uruncek['urun_detay'] ?>
						</p>
					</div>
					<div class="tab-pane <?php
						if(isset($_GET["durum"])) {
							echo "active in";
						}
					?> fade" id="rev">
						
						<?php
					
							if($yorumSayi > 0) {
								foreach($yorumlar as $yorum) {
								$userleriSorgula = $db->prepare("SELECT * FROM users WHERE user_id = ?");
								$userleriSorgula->execute([$yorum["kullanici_id"]]);
								$user = $userleriSorgula->fetch(PDO::FETCH_ASSOC);
								$id = $yorum["yorum_id"];
						
								?>
								<p class="dash">
									<span ><?=$user["user_name"]?></span> (<?=$yorum["yorum_zaman"]?>) <?=$yorum["kullanici_id"]==$user_id?'<span><a class="toDelComment" style="font-size: 20px; color: red; cursor: pointer" href="./nedmin/netting/islem.php?yorum_id='.$id.'&commentisil=ok&url='.$url.'">␡</a></span>':null?><br><br>
									<?=$yorum["yorum_detay"]?>
								</p>
							
								<?php
								}
							} else {
								echo "Bu məhsul üçün hələ şərh yazılmayıb";
							}
						?>
						<h4>Yorum Yazın</h4>
						<?php if (isset($_SESSION['user'])) {
					?>
						<form action="./nedmin/netting/islem.php?urun_id=<?=$_GET['urun_id']?>" method="post" role="form">
							<div class="form-group">
								<textarea name="urun_detay" class="form-control" placeholder="Xahirş edirik, şərhinizi bura yazın..." id="text"></textarea>
							</div>
							
							<input name="url" value="<?=$url.'?'?>" type="hidden" type="text">
							<button name="comment" type="submit" class="btn btn-default btn-red btn-sm">Şərhi Göndər</button>
						</form>

						<?php } else {?>

						Şərh yaza bilmək üçün <a style="color:red" href="register">qeydiyyatdan</a> keçməli, yada istifadəçi hesabınız varsa, daxil olmalısınız...

						<?php } ?>

						

					</div>

					<div class="tab-pane fade " id="video">
						<p>
							

							<?php 

							$say=strlen($uruncek['urun_video']);

							if ($say>0) {?>
							
							<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $uruncek['urun_video'] ?>" frameborder="0" allowfullscreen></iframe>

							<?php } else {

								echo "Bu məhsul üçün video əlavə edilməmişdir";

							}

							?>
						</p>
					</div>


				</div>
			</div>

			<div id="title-bg">
				<div class="title">Oxşar Məhsullar</div>
			</div>
			<div class="row prdct"><!--Products-->
				

				<?php 

				$kategori_id=$uruncek['kategori_id'];

				$urunaltsor=$db->prepare("SELECT * FROM urunler where kategori_id=:kategori_id order by  rand() limit 3");
				$urunaltsor->execute(array(
					'kategori_id' => $kategori_id
					));

				while($urunaltcek=$urunaltsor->fetch(PDO::FETCH_ASSOC)) {
					
					?>

					<div class="col-md-4">
						<div class="productwrap">
							<div class="pr-img">
								<div class="hot"></div>
								<a href="urun-<?=seo($urunaltcek["urun_ad"]).'-'.$urunaltcek["urun_id"]?>"><img src="images\sample-3.jpg" alt="" class="img-responsive"></a>
								<div class="pricetag on-sale"><div class="inner on-sale"><span class="onsale"><span class="oldprice"><?php echo $urunaltcek['urun_fiyat']*1.50 ?>TL</span><?php echo $urunaltcek['urun_fiyat'] ?>TL</span></div></div>
							</div>
							<span class="smalltitle"><a href="product.htm"><?php echo $urunaltcek['urun_ad'] ?></a></span>
							<span class="smalldesc">Ürün Kodu.: <?php echo $urunaltcek['urun_id'] ?></span>
						</div>
					</div>

					<?php } ?>


				</div><!--Products-->
				<div class="spacer"></div>
			</div><!--Main content-->


			<?php include 'sidebar.php' ?>
		</div>
	</div>
	<script>
		  document.querySelector(".toDelComment").addEventListener("click", (e) => {
			if(confirm("Şərhi Silmək İstədiyinizdən Əminsiniz?")) {
				
			} else {
				e.preventDefault();
			}
		})
	</script>
	<?php include 'footer.php' ?>