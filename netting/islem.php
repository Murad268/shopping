<?php
   require_once("./baglan.php");
   if(isset($_POST["general"])) {
      if(isset($_POST["ayar_title"])) {
         $ayar_title = $_POST["ayar_title"];
      } else {
         $ayar_title = "";
      }

      if(isset($_POST["ayar_description"])) {
         $ayar_description = $_POST["ayar_description"];
      } else {
         $ayar_description = "";
      }

      if(isset($_POST["ayar_keywords"])) {
         $ayar_keywords = $_POST["ayar_keywords"];
      } else {
         $ayar_keywords = "";
      }

      if(isset($_POST["ayar_author"])) {
         $ayar_author = $_POST["ayar_author"];
      } else {
         $ayar_author = "";
      }

      if(($ayar_title == "") or ($ayar_description == "") or ($ayar_keywords == "") or ($ayar_author == "")) {
         header("Location: ../nedmin/production/generalP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET ayar_title = ?, ayar_description = ?, ayar_keywords = ?, ayar_author = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$ayar_title, $ayar_description, $ayar_keywords, $ayar_author]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../nedmin/production/generalP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../nedmin/production/generalP.php?status=ok");
            exit();
         } else {
            header("Location: ../nedmin/production/generalP.php?status=no");
            exit();
         }
      }
      

   }



   if(isset($_POST["contacts"])) {
      if(isset($_POST["ayar_tel"])) {
         $ayar_tel = $_POST["ayar_tel"];
      } else {
         $ayar_tel = "";
      }

      if(isset($_POST["ayar_gsm"])) {
         $ayar_gsm = $_POST["ayar_gsm"];
      } else {
         $ayar_gsm = "";
      }

      if(isset($_POST["ayar_faks"])) {
         $ayar_faks = $_POST["ayar_faks"];
      } else {
         $ayar_faks = "";
      }

      if(isset($_POST["ayar_mail"])) {
         $ayar_mail = $_POST["ayar_mail"];
      } else {
         $ayar_mail = "";
      }
      if(isset($_POST["ayar_seher"])) {
         $ayar_seher = $_POST["ayar_seher"];
      } else {
         $ayar_seher = "";
      }
      if(isset($_POST["ayar_rayon"])) {
         $ayar_rayon = $_POST["ayar_rayon"];
      } else {
         $ayar_rayon = "";
      }

      if(isset($_POST["ayar_adres"])) {
         $ayar_adres = $_POST["ayar_adres"];
      } else {
         $ayar_adres = "";
      }

      if(isset($_POST["ayar_mesai"])) {
         $ayar_mesai = $_POST["ayar_mesai"];
      } else {
         $ayar_mesai = "";
      }
      if(($ayar_tel == "") or ($ayar_gsm == "") or ($ayar_faks == "") or ($ayar_mail == "") or ($ayar_seher == "") or ($ayar_rayon == "") or ($ayar_adres == "") or ($ayar_mesai == "")) {
         header("Location: ../nedmin/production/contactP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET ayar_tel = ?, ayar_gsm = ?, ayar_faks = ?, ayar_mail = ?, ayar_seher = ?,ayar_rayon = ?, ayar_adres = ?, ayar_mesai = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$ayar_tel, $ayar_gsm, $ayar_faks, $ayar_mail, $ayar_seher, $ayar_rayon, $ayar_adres, $ayar_mesai]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../nedmin/production/contactP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../nedmin/production/contactP.php?status=ok");
            exit();
         } else {
            header("Location: ../nedmin/production/contactP.php?status=no");
            exit();
         }
      }
      

   }






   if(isset($_POST["api"])) {
      if(isset($_POST["ayar_maps"])) {
         $ayar_maps = $_POST["ayar_maps"];
      } else {
         $ayar_maps = "";
      }

      if(isset($_POST["ayar_analystic"])) {
         $ayar_analystic = $_POST["ayar_analystic"];
      } else {
         $ayar_analystic = "";
      }

      if(isset($_POST["ayar_zopim"])) {
         $ayar_zopim = $_POST["ayar_zopim"];
      } else {
         $ayar_zopim = "";
      }

    

      if(($ayar_zopim == "") or ($ayar_analystic == "") or ($ayar_zopim == "")) {
         header("Location: ../nedmin/production/apiP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET ayar_maps = ?, ayar_analystic = ?, ayar_zopim = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$ayar_maps, $ayar_analystic, $ayar_zopim]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../nedmin/production/apiP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../nedmin/production/apiP.php?status=ok");
            exit();
         } else {
            header("Location: ../nedmin/production/apiP.php?status=no");
            exit();
         }
      }
      

   }




   if(isset($_POST["mail"])) {
      if(isset($_POST["smtp_user"])) {
         $smtp_user = $_POST["smtp_user"];
      } else {
         $smtp_user = "";
      }
      if(isset($_POST["ayar_smtpport"])) {
         $ayar_smtpport = $_POST["ayar_smtpport"];
      } else {
         $ayar_smtpport = "";
      }

      if(isset($_POST["ayar_smtphost"])) {
         $ayar_smtphost = $_POST["ayar_smtphost"];
      } else {
         $ayar_smtphost = "";
      }

      if(isset($_POST["ayar_smtppassword"])) {
         $ayar_smtppassword = $_POST["ayar_smtppassword"];
      } else {
         $ayar_smtppassword = "";
      }

    

      if(($smtp_user == "") or ($ayar_smtpport == "") or ($ayar_smtphost == "") or ($ayar_smtppassword == "")) {
         header("Location: ../nedmin/production/mailP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET smtp_user = ?, ayar_smtpport = ?, ayar_smtphost = ?, ayar_smtppassword = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$smtp_user, $ayar_smtpport, $ayar_smtphost, $ayar_smtppassword,]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../nedmin/production/mailP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../nedmin/production/mailP.php?status=ok");
            exit();
         } else {
            header("Location: ../nedmin/production/mailP.php?status=no");
            exit();
         }
      }
      

   }


   if(isset($_POST["social"])) {
      if(isset($_POST["ayar_facebook"])) {
         $ayar_facebook = $_POST["ayar_facebook"];
      } else {
         $ayar_facebook = "";
      }

      if(isset($_POST["ayar_twitter"])) {
         $ayar_twitter = $_POST["ayar_twitter"];
      } else {
         $ayar_twitter = "";
      }

      if(isset($_POST["ayar_google"])) {
         $ayar_google = $_POST["ayar_google"];
      } else {
         $ayar_google = "";
      }

      if(isset($_POST["ayar_youtube"])) {
         $ayar_youtube = $_POST["ayar_youtube"];
      } else {
         $ayar_youtube = "";
      }

      if(($ayar_facebook == "") or ($ayar_twitter == "") or ($ayar_google == "") or ($ayar_youtube == "")) {
         header("Location: ../nedmin/production/socialP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET ayar_facebook = ?, ayar_twitter = ?, ayar_google = ?, ayar_youtube = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$ayar_facebook, $ayar_twitter, $ayar_google, $ayar_youtube]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../nedmin/production/socialP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../nedmin/production/socialP.php?status=ok");
            exit();
         } else {
            header("Location: ../nedmin/production/socialP.php?status=no");
            exit();
         }
      }
      

   }
?>