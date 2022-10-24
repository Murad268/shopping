<?php
	ob_start();
	session_start();
   require_once('nedmin/netting/baglan.php');
	require_once('./nedmin/netting/functions.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$ayar_title?></title>
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
									<a href="#"  id="reg" class="btn btn-default btn-dark">Daxil ol<span>-- Ya da --</span>Qeydiyyatdan keç</a>
								<?php
								} else {?>
									<a href="#" class="btn btn-default btn-dark">Xoşgəldin<span>--</span><?=$user_name?></a>
								<?php
								}
							?>
							<div class="regwrap">
								<div class="row">
									<div class="col-md-6 regform">
										<div class="title-widget-bg">
											<div class="title-widget">İstifadəçi Girişi</div>
										</div>
										<form action="./nedmin/netting/islem.php" method="post" role="form">
											<div class="form-group">
												<input type="mail" class="form-control" name="username" id="username" placeholder="E-Mail">
											</div>
											<div class="form-group">
												<input type="password" class="form-control" name="password" id="password" placeholder="Şifrə">
											</div>
											<div class="form-group">
												<button name="userenter" class="btn btn-default btn-red btn-sm">Daxil Ol</button>
											</div>
										</form>
									</div>
									<div class="col-md-6">
										<div class="title-widget-bg">
											<div class="title-widget">Qeydiyyatdan Keç</div>
										</div>
										<p>
											yeni istifadəçi? Hesab yaratmaqla siz daha sürətli alış-veriş edə, sifarişin statusundan xəbərdar ola bilərsiniz...
										</p>
										<a href="register.php"><button class="btn btn-default btn-yellow">İndi Qeyd Ol</button></a>
									</div>
								</div>
							</div>
							<div class="srch-wrap">
								<a href="#" id="srch" class="btn btn-default btn-search"><i class="fa fa-search"></i></a>
							</div>
							<div class="srchwrap">
								<div class="row">
									<div class="col-md-12">
										<form class="form-horizontal" role="form">
											<div class="form-group">
												<label for="search" class="col-sm-2 control-label">Search</label>
												<div class="col-sm-10">
													<input type="text" class="form-control" id="search">
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
								<li><a href="index.php" class="active">Ana Səhifə</a><div class="curve"></div></li>
							
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
						<button id="popcart" class="btn btn-default btn-chart btn-sm "><span class="mychart">Səbət</span>|<span class="allprice">$<?=$toplam_fiyat?></span></button>
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
											echo "Səbətdə məhsul yoxdur";
										}
									?>
								
								</tbody>
							</table>
							<br>
							<div class="btn-popcart">
								<a href="checkout.htm" class="btn btn-default btn-red btn-sm">Ödəmə Səhifəsi</a>
								<a href="sepet.php" class="btn btn-default btn-red btn-sm">Səbətə Get</a>
							</div>
							<div class="popcart-tot">
								<p>
									Total<br>
									<span>$<?=$toplam_fiyat?></span>
								</p>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<?php
						if(isset($_SESSION["user"])) {?>
							<ul class="small-menu">
								<li><a href="hesabim.php" class="myacc">Mənim hesabım</a></li>
								<li><a href="" class="myshop">Sifarişlərim</a></li>
								<li><a href="logout.php" class="mycheck">Güvənli Çıxış</a></li>
							</ul>
						<?php
						}
					?>
				
				</div>
			</div>
		</div>
	</div><!--end main-nav -->