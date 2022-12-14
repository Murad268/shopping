<?php
	ob_start();
	session_start();
   require_once('nedmin/netting/baglan.php');
	require_once('./nedmin/netting/functions.php');
	if(isset($_REQUEST["sayfalama"])) {
      $sayfalama = $_REQUEST["sayfalama"];
   } else {
      $sayfalama = 1;
   }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="<?=$ayar_description?>">
    <meta name="keywords" content="<?=$ayar_keywords?>">
    <meta name="author" content="<?=$ayar_author?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
	 <link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	 <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	 <link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<!-- Bootstrap -->
    <link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">
	
	<!-- Main Style -->
	 <link rel="stylesheet" href="style.css">
	
	<!-- owl Style -->
	 <link rel="stylesheet" href="css\owl.carousel.css">
	   <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
	 <link rel="stylesheet" href="css\owl.transitions.css">
	

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div id="wrapper">
	<div class="header"><!--Header -->
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-md-4 main-logo">
					<a href="index.php"><img style="height: 55px" width="150px" src="<?=$ayar_logo?>" alt="logo" class="logo img-responsive"></a>
				</div>
				<div class="col-md-8">
					<div class="pushright">
						<div class="top">
							<?php
								if(!isset($_SESSION["user"])) {?>
									<a href="#"  id="reg" class="btn btn-default btn-dark">Daxil ol<span>-- Ya da --</span>Qeydiyyatdan ke??</a>
								<?php
								} else {?>
									<a href="#" class="btn btn-default btn-dark">Xo??g??ldin<span>--</span><?=$user_name?></a>
								<?php
								}
							?>
							<div class="regwrap">
								<div class="row">
									<div class="col-md-6 regform">
										<div class="title-widget-bg">
											<div class="title-widget">??stifad????i Giri??i</div>
										</div>
										<form action="./nedmin/netting/islem.php" method="post" role="form">
											<div class="form-group">
												<input type="mail" class="form-control" name="username" id="username" placeholder="E-Mail">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" name="password" id="password" placeholder="??ifr??">
											</div>
											<div class="form-group">
												<button name="userenter" class="btn btn-default btn-red btn-sm">Daxil Ol</button>
												<a href="register" name="userenter" class="btn btn-default btn-red btn-sm">??ifr??ni unutmu??am</a>
											</div>
										</form>
									</div>
									<div class="col-md-6">
										<div class="title-widget-bg">
											<div class="title-widget">Qeydiyyatdan Ke??</div>
										</div>
										<p>
											yeni istifad????i? Hesab yaratmaqla siz daha s??r??tli al????-veri?? ed??, sifari??in statusundan x??b??rdar ola bil??rsiniz...
										</p>
										<a href="register.php"><button class="btn btn-default btn-yellow">??ndi Qeyd Ol</button></a>
									</div>
								</div>
							</div>
							<div class="srch-wrap">
								<a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
							</div>
							<div class="srchwrap">
								<div class="row">
									<div class="col-md-12">
										<form method="post" action="arama.php" class="form-horizontal" role="form">
											<div class="form-group">
												<label for="search" class="col-sm-2 control-label">Search</label>
												<div class="col-sm-10">
													<input name="arama" type="text" class="form-control" id="search">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="dashed"></div>
	</div><!--Header -->
	<div class="main-nav"><!--end main-nav -->
		<div class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="navbar-collapse collapse">
							<ul class="nav navbar-nav">
								<li><a href="index.php" class="active">Ana S??hif??</a><div class="curve"></div></li>
							
								<?php
									$menuSor = $db->prepare("SELECT * FROM menuler WHERE menu_durum = '1' ORDER BY menu_sira ASC LIMIT 5");
									$menuSor->execute();
									while($menuCek = $menuSor->fetch(PDO::FETCH_ASSOC)) {?>
										<li><a href="
											<?php
												if(!empty($menuCek["menu_url"])) {
													echo $menuCek["menu_url"];
												} else {
													echo "sayfa-".seo($menuCek["menu_ad"]);
												}
											?>
										"><?=$menuCek["menu_ad"]?></a></li>
									<?php
									}
								?>
							</ul>
						</div>
					</div>
					<?php
						if(isset($_SESSION["user"])) {?>
						<div class="col-md-2 machart">
						<?php
							$toplamFiyatHesaplamaSorgusu = $db->prepare("SELECT * FROM sepet WHERE kullanici_id = ?");;
							$toplamFiyatHesaplamaSorgusu->execute([$user_id]);
							$sepetIcindekiler = $toplamFiyatHesaplamaSorgusu->fetchAll(PDO::FETCH_ASSOC);
							$sepetIcerikSayi = $toplamFiyatHesaplamaSorgusu->rowCount();
							$toplam_fiyat = "0.00";
							if($sepetIcerikSayi > 0) {	
								foreach($sepetIcindekiler as $sepet) {
									$urunleriSorgula = $db->prepare("SELECT * FROM urunler WHERE urun_id = ?");
									$urunleriSorgula->execute([$sepet["urun_id"]]);
									$urun = $urunleriSorgula->fetch(PDO::FETCH_ASSOC);
									$toplam_fiyat+=$urun["urun_fiyat"] * $sepet["urun_adet"];
								}
							}
						?>
						<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">S??b??t</span>|<span class="allprice">$<?=$toplam_fiyat?></span></button>
						<div class="popcart">
							<table class="table table-condensed popcart-inner">
								<tbody>
									<?php
										$sepetsorgula = $db->prepare("SELECT * FROM sepet WHERE kullanici_id = ?");
										$sepetsorgula->execute([$user_id]);
										$sepetIcerikleri = $sepetsorgula->fetchAll(PDO::FETCH_ASSOC);
										$sepetSayi = $sepetsorgula->rowCount();
										if($sepetSayi>0) {
											$toplam_fiyat = 0;
											foreach($sepetIcerikleri as $sepet) {
												$urunleriSorgula = $db->prepare("SELECT * FROM urunler WHERE urun_id = ?");
												$urunleriSorgula->execute([$sepet["urun_id"]]);
												$urun = $urunleriSorgula->fetch(PDO::FETCH_ASSOC);
												$toplam_fiyat+=$urun["urun_fiyat"] * $sepet["urun_adet"];
												?>
												<tr>
													<td>
													<a href="product.htm"><img src="images\dummy-1.png" alt="" class="img-responsive"></a>
													</td>
													<td><a href="product.htm"><?=substr($urun["urun_ad"], 0, 25)."</br>".substr($urun["urun_ad"], 25)?></a></td>
													<td><?=$sepet["urun_adet"]?>X</td>
													<td>$<?=$urun["urun_fiyat"] * $sepet["urun_adet"]?></td>
												
												</tr>
											<?php
											}
										} else {
											echo "S??b??td?? m??hsul yoxdur";
										}
									?>
								
								</tbody>
							</table>
							<br>
							<div class="btn-popcart">
								<a href="sepet.php" class="btn btn-default btn-red btn-sm">S??b??t?? Get</a>
							</div>
							<div style="width: max-content" class="popcart-tot">
								<p>
									Total<br>
									<span>$<?=$toplam_fiyat?></span>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
						<?php
						}
					?>
					<?php
						if(isset($_SESSION["user"])) {?>
							<ul class="small-menu">
								<li><a href="hesabim.php" class="myacc">M??nim hesab??m</a></li>
								<li><a href="siparis" class="myshop">Sifari??l??rim</a></li>
								<li><a href="logout.php" class="mycheck">G??v??nli ????x????</a></li>
							</ul>
						<?php
						}
					?>
				
				</div>
			</div>
		</div>
	</div>
	<?php
		if(isset($_GET["addedStatus"])) {
			if($_GET["addedStatus"]=="ok") {?>
				<script>alert("Siz x??b??rl??r?? u??urla abun?? oldunuz.")</script>
			<?php
			} elseif($_GET["addedStatus"]=="empty") {?>
				<script>alert("Email ??nvan?? daxil edilm??yib!")</script>
			<?php
			} elseif($_GET["addedStatus"]=="yes") {?>
				<script>alert("Siz art??q abun?? olmusunuz.")</script>
			<?php
		}	else {?>
				<script>alert("Abun?? olunma zaman?? x??ta. Xahi?? edirik, bir az sonra t??krar yoxlay??n.")</script>
			<?php
			}
		}
	?>