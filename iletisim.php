<?php include 'header.php' ?>
<head>
	<title>Bizimlə Əlaqə</title>
</head>
<div class="container">
	
	<div class="clearfix"></div>
	<div class="lines"></div>
</div>

<div class="container">
	<div class="row">
		
	</div>

	
	<div class="title-bg">
		<div class="title">Əlaqə Səhifəsi</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<p class="page-content">
         Aşağıdakı məlumatlardan bizimlə əlaqə saxlaya və ya poçt formasından istifadə edə bilərsiniz.
			</p>
			<ul class="contact-widget">
				<li class="fphone"><?php echo  $ayar_tel?></li>
				<li class="fmobile"><?php echo  $ayar_gsm ?></li>
				<li class="fmail lastone"><?php echo  $ayar_mail ?></li>
			</ul>
		</div>
		<div class="col-md-7 col-md-offset-1">
			
			<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
			<div id="googlemaps" class="google-map google-map-footer">
				<iframe
				width="100%"
				height="100%"
				frameborder="0" style="border:0"
				src="https://www.google.com/maps/embed/v1/place?key=<?php echo $ayarcek['ayar_goooglemap']; ?>
				&q=<?php echo $ayarcek['ayar_adres']; ?>" allowfullscreen>
			</iframe>

		</div>
	</div>
</div>

<div class="title-bg">
	<div class="title">Əlaqə Forumu</div>
</div>
<div class="qc">
	<form action="./mail.php" method="POST" role="form">
		
		<div class="form-group">
			<label for="name">Ad Soyad<span>*</span></label>
			<input type="text" name="adsoyad" class="form-control" id="name">
		</div>
		<div class="form-group">
			<label for="email">Mail<span>*</span></label>
			<input type="email" name="email" class="form-control" id="email">
		</div>
		<div class="form-group">
			<label for="text">Mesaj<span>*</span></label>
			<textarea name="mesaj" class="form-control" id="text"></textarea>
		</div>

		<?php 
		$sayi1=rand(10,30);
		$sayi2=rand(0,10);
		$toplam=$sayi1+$sayi2;
		?>

		<input type="hidden" value="<?php echo $toplam; ?>" name="toplam">

		<div class="form-group">
			<label for="name">Əməliyyat Nəticəsi?<span>*</span></label>
			<input type="text" name="islem"  placeholder="<?php echo $sayi1." + ".$sayi2. " kaçtır ?";  ?>" class="form-control" id="name">
		</div>
		<button type="submit" class="btn btn-default btn-red btn-sm">Formu Gönder</button>
	</form>
</div>
<div class="spacer"></div>

</div>

<?php include 'footer.php' ?>