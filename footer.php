<!-- Start of  Zendesk Widget script -->
<script id="ze-snippet" src="<?=$ayar_zopim?>"> </script>
<!-- End of  Zendesk Widget script -->
	<div class="f-widget"><!--footer Widget-->
		<div class="container">
			<div class="row">
				<div class="col-md-4"><!--footer twitter widget-->
					<div class="title-widget-bg">
						<div class="title-widget">Twitter Updates</div>
					</div>
			
					<div class="clearfix"></div>
					<a href="<?=$ayar_twitter?>" class="btn btn-default btn-follow"><i class="fa fa-twitter fa-2x"></i><div>Follow us on twitter</div></a>
				</div><!--footer twitter widget-->
				<div class="col-md-4"><!--footer newsletter widget-->
					<div class="title-widget-bg">
						<div class="title-widget">Xəbərlərə abunə olun</div>
					</div>
					<div class="newsletter">
						<p>
							Bütün yeniliklərdən dərhal xəbərdar olmaqistəyirsən? O zaman abunə ol və hər zaman bizimlə qal.
						</p>
						<form action="./nedmin/netting/islem.php" method="post" role="form">
							<div class="form-group">
								<label>E-poçt ünvanınız</label>
								<input name="newsRegisterEmail" type="email" class="form-control newstler-input" id="exampleInputEmail1" placeholder="Email ünvanınızı daxil edin">
								<button name="newsSign" class="btn btn-default btn-red btn-sm">Qeyd Olun</button>
							</div>
						</form>
					</div>
				</div><!--footer newsletter widget-->
				<div class="col-md-4"><!--footer contact widget-->
					<div class="title-widget-bg">
						<div class="title-widget-cursive">Shopping</div>
					</div>
					<ul class="contact-widget">
						<li class="fphone"><?=$ayar_tel?> <br> <?=$ayar_faks?></li>
						<li class="fmobile"><?=$ayar_gsm?><br><?=$ayar_gsm?></li>
						<li class="fmail lastone"><?=$ayar_mail?><br></li>
					</ul>
				</div><!--footer contact widget-->
			</div>
			<div class="spacer"></div>
		</div>
	</div><!--footer Widget-->
	<div class="footer"><!--footer-->
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<ul class="footermenu"><!--footer nav-->
						<li><a href="index.php">Ana Səhifə</a></li>
						<li><a href="sepet.php">Mənim səbətim</a></li>
						<li><a href="siparis.php">Sifarişlərim</a></li>
						<li><a href="iletisim.php">Bizimlə əlaqə</a></li>
					</ul><!--footer nav-->
					<div class="f-credit">&copy;<?=$ayar_author?> <a href="http://itmurad.epizy.com/myportfolio/ ">itmurad.epizy.com</a></div>
					<a href=""><div class="payment visa"></div></a>
					<a href=""><div class="payment paypal"></div></a>
					<a href=""><div class="payment mc"></div></a>
					<a href=""><div class="payment nh"></div></a>
				</div>
				<div class="col-md-3"><!--footer Share-->
					<div class="followon">Bizi izləyin</div>
					<div class="fsoc">
						<a href="<?=$ayar_twitter?>" class="ftwitter">twitter</a>
						<a href="<?=$ayar_facebook?>" class="ffacebook">facebook</a>
						<a href="<?=$ayar_youtube?>" class="fflickr">youtube</a>
						<a href="<?=$ayar_google?>" class="ffeed">Google</a>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div><!--footer Share-->
			</div>
		</div>
	</div><!--footer-->
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap\js\bootstrap.min.js"></script>
	
	<!-- map -->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
	<script type="text/javascript" src="js\jquery.ui.map.js"></script>
	<script type="text/javascript" src="js\demo.js"></script>
	
	<!-- owl carousel -->
    <script src="js\owl.carousel.min.js"></script>
	
	<!-- rating -->
	<script src="js\rate\jquery.raty.js"></script>
	<script src="js\labs.js" type="text/javascript"></script>
	
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="js\product\lib\jquery.mousewheel-3.0.6.pack.js"></script>
	
	<!-- fancybox -->
    <script type="text/javascript" src="js\product\jquery.fancybox.js?v=2.1.5"></script>
	
	<!-- custom js -->
    <script src="js\shop.js"></script>
	</div>
  </body>
</html>
