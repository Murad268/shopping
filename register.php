<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">İstifadəçi Qeydiyyatı</div>
							<p>Aşağıdakı forma vasitəsilə istifadəçi qeydiyyatını həyata keçirə bilərsiniz.</p>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Qeydiyyat Bilgiləri</div>
				</div>

				<?php 

               if(isset($_GET["durum"])) {
                  if ($_GET['durum']=="farklisifre") {?>

                     <div class="alert alert-danger">
                        <strong>Hata!</strong> Daxil etdiyiniz şifreler üst-üstə düşmür.
                     </div>
                        
                     <?php } elseif ($_GET['durum']=="eksiksifre") {?>
         
                     <div class="alert alert-danger">
                        <strong>Xəta!</strong> Şifrəniz minimum 6 simvol uzunluğunda olmalıdır.
                     </div>
                        
                     <?php } elseif ($_GET['durum']=="mukerrerkayit") {?>
         
                     <div class="alert alert-danger">
                        <strong>Xəta!</strong> Bu email daha önce qeydiyyatdan keçirilmişdir.
                     </div>
                        
                     <?php } elseif ($_GET['durum']=="basarisiz") {?>
         
                     <div class="alert alert-danger">
                        <strong>Hata!</strong> Qeydiyyatdan Keçirilmədi! Sistem Admininə Probleminizi Bildirin.
                     </div>
                        
                     <?php }
               }
				 ?>


				


				<div class="form-group dob">
					<div class="col-sm-12">
						
						<input type="text" class="form-control"  required="" name="kullanici_adsoyad" placeholder="Ad ve Soyadınızı Daxil Edin...">
					</div>
					
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" class="form-control" required="" name="kullanici_mail"  placeholder="Diqqət! E-poçt ünvanınız istifadəçi adınız olacaq..">
					</div>
				</div>
				<div class="form-group dob">
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordone"    placeholder="Şifrənizi Daxil Edin...">
					</div>
					<div class="col-sm-6">
						<input type="password" class="form-control" name="kullanici_passwordtwo"   placeholder="Şifrənizi Təkrar Daxil Edin...">
					</div>
				</div>



				<button type="submit" name="kullanicikaydet" class="btn btn-default btn-red">Qeydiyyatdan keçin</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrəni unutmusan?</div>
				</div>


				<center><img width="400" src="http://www.emrahyuksel.com.tr/dimg/sifremi-unuttum.jpg"></center>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>