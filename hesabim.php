<?php include 'header.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="page-title-wrap">
				<div class="page-title-inner">
					<div class="row">
						<div class="col-md-12">
							<div class="bigtitle">Hesab Bilgilərim</div>
							<p >Bilgilərinizi aşağıdan duzələyəbilərsiniz...</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   <?php
      if(isset($_GET["status"])) {
         if($_GET["status"] == "same") {?>
         <div class="alert alert-warning">
            <strong>Xəbərdarlıq!</strong>Bu e-mail ilə istifadəçi mövcuddur.
         </div>
         <?php
         } elseif($_GET["status"] == "ok") {?>
         <div class="alert alert-success">
            <strong>Ok!</strong> Məlumatlar uğurla yeniləndilər.
         </div>
         <?php
         } else {?>
         <div class="alert alert-danger">
            <strong>Xəta!</strong> Məlumatların yenilənməsi zamanı xəta!.
         </div>
         <?php
         }
      }
   ?>
	<form action="nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
		<div class="row">
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Hesab Bilgiləri</div>
				</div>

				<div class="form-group dob">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">Qeydiyyat Tarixi<span class="required">*</span>
                  </label>
						<input disabled type="text" value="<?=$user_date?>" class="form-control"  required="" name="user_date">
					</div>
					
				</div>
				<div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">TC kodu<span class="required">*</span>
                  </label>
						<input type="text" class="form-control"  value="<?=$user_tc?>"  name="user_tc"  placeholder="TC Kodunuzu daxil edin">
					</div>
				</div>
			
            <div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">Adınız, Soyadınız<span class="required">*</span>
                  </label>
						<input type="text" class="form-control"  value="<?=$user_name?>"  name="user_name"  placeholder="Ad Soyadınızı daxil edin.">
					</div>
				</div>

            <div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">Adınız, Soyadınız<span class="required">*</span>
                  </label>
						<input type="email" class="form-control"  value="<?=$user_email?>"  name="user_email"  placeholder="E-Mailinzi daxil edin.">
					</div>
				</div>

            <div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">GSM nömrəniz<span class="required">*</span>
                  </label>
						<input type="text" class="form-control"  value="<?=$user_gsm?>"  name="user_gsm"  placeholder="GSM nömrənizi daxil edin.">
					</div>
				</div>
            <div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">Telefon nömrəniz<span class="required">*</span>
                  </label>
						<input type="text" class="form-control"  value="<?=$user_tel?>"  name="user_tel"  placeholder="Telefon nömrənizi daxil edin.">
					</div>
				</div>
            <div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">Şifrəniz<span class="required">*</span>
                  </label>
						<input type="password" class="form-control"  value="<?=$user_pass?>"  name="user_pass"  placeholder="Şifrənizi daxil edin.">
					</div>
				</div>
            <div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">Adresiniz<span class="required">*</span>
                  </label>
						<input type="text" class="form-control"  value="<?=$user_adres?>"  name="user_adres"  placeholder="Adresinizi daxil edin.">
					</div>
				</div>
            <div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">Şəhər<span class="required">*</span>
                  </label>
						<input type="text" class="form-control"  value="<?=$user_seher?>"  name="user_seher"  placeholder="Şəhərinizi daxil edin.">
					</div>
				</div>
            <div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">Rayon<span class="required">*</span>
                  </label>
						<input type="text" class="form-control"  value="<?=$user_rayon?>"  name="user_rayon"  placeholder="Rayonunuzu daxil edin.">
					</div>
				</div>
            <div class="form-group">
					<div class="col-sm-12">
                  <label class="control-label" for="first-name">Ünvan<span class="required">*</span>
                  </label>
						<input type="text" class="form-control"  value="<?=$user_unvan?>"  name="user_unvan"  placeholder="Ünvanınızı daxil edin.">
					</div>
				</div>
            <input value="<?=$user_id?>" type="hidden" name="user_id">
				<button type="submit" name="kullaniciyenile" class="btn btn-default btn-red">Bilgilərimi Yenilə</button>
			</div>
			<div class="col-md-6">
				<div class="title-bg">
					<div class="title">Şifrənizi Unuttunuz?</div>
				</div>


				<center><img width="400" src="http://www.emrahyuksel.com.tr/dimg/sifremi-unuttum.jpg"></center>
			</div>
		</div>
	</div>
</form>
<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>