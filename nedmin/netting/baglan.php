<?php
   try {
      $db = new PDO("mysql:host=localhost; dbname=shopping; charset=utf8", "root", "");
      $__AYARLARSORGUSU = $db->prepare("SELECT * FROM ayarlar WHERE id = 1");
      $__AYARLARSORGUSU->execute();
      $__AYARLAR = $__AYARLARSORGUSU->fetch(PDO::FETCH_ASSOC);

     
      $ayar_logo = $__AYARLAR["ayar_logo"];
      $ayar_title = $__AYARLAR["ayar_title"];
      $ayar_description = $__AYARLAR["ayar_description"];
      $ayar_author = $__AYARLAR["ayar_author"];
      $ayar_tel = $__AYARLAR["ayar_tel"];
      $ayar_gsm = $__AYARLAR["ayar_gsm"];
      $ayar_faks = $__AYARLAR["ayar_faks"];
      $ayar_mail = $__AYARLAR["ayar_mail"];
      $ayar_seher = $__AYARLAR["ayar_seher"];
      $ayar_rayon = $__AYARLAR["ayar_rayon"];
      $ayar_adres = $__AYARLAR["ayar_adres"];
      $ayar_mesai = $__AYARLAR["ayar_mesai"];
      $ayar_maps = $__AYARLAR["ayar_maps"];
      $ayar_analystic = $__AYARLAR["ayar_analystic"];
      $ayar_zopim = $__AYARLAR["ayar_zopim"];
      $ayar_facebook = $__AYARLAR["ayar_facebook"];
      $ayar_twitter = $__AYARLAR["ayar_twitter"];
      $ayar_google = $__AYARLAR["ayar_google"];
      $ayar_youtube = $__AYARLAR["ayar_youtube"];
      $smtp_user = $__AYARLAR["smtp_user"];
      $ayar_smtpport = $__AYARLAR["ayar_smtpport"];
      $ayar_smtphost = $__AYARLAR["ayar_smtphost"];
      $ayar_smtppassword = $__AYARLAR["ayar_smtppassword"];
      $ayar_bakim = $__AYARLAR["ayar_bakim"];
      $ayar_keywords = $__AYARLAR["ayar_keywords"];
      $site_linki = $__AYARLAR["site_linki"];



      $__HAKKIMIZDASORGUSU = $db->prepare("SELECT * FROM about WHERE id = 1");
      $__HAKKIMIZDASORGUSU->execute();
      $__HAKKIMIZDA = $__HAKKIMIZDASORGUSU->fetch(PDO::FETCH_ASSOC);
      $about_title = $__HAKKIMIZDA["about_title"];
      $about_desc = $__HAKKIMIZDA["about_desc"];
      $about_video = $__HAKKIMIZDA["about_video"];
      $about_vizyon = $__HAKKIMIZDA["about_vizyon"];
      $about_misyon = $__HAKKIMIZDA["about_misyon"];

      if(isset($_SESSION["user"])) {
         $USERSORGUSU = $db->prepare("SELECT * FROM users WHERE user_email = ?");
         $USERSORGUSU->execute([$_SESSION["user"]]);
         $USERS = $USERSORGUSU->fetch(PDO::FETCH_ASSOC);
        
         $user_id = $USERS["user_id"];
         $user_name = $USERS["user_name"];
         $user_email = $USERS["user_email"];
         $user_date = $USERS["user_date"];
         $user_tc = $USERS["user_tc"];
         $user_gsm = $USERS["user_gsm"];
         $user_gsm = $USERS["user_gsm"];
         $user_pass = $USERS["user_pass"];
         $user_adres = $USERS["user_adres"];
         $user_seher = $USERS["user_seher"];
         $user_rayon = $USERS["user_rayon"];
         $user_unvan = $USERS["user_unvan"];
         $user_tel = $USERS["user_tel"];
  
      }

    
        

    
   } catch(PDOException $e) {
      echo $e->getMessage();
   }
?>