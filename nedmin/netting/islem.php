<?php
   ob_start();
   session_start();
   require_once("./baglan.php");
   require_once('./functions.php');
   if(isset($_POST["general"])) {
      if(isset($_POST["site_linki"])) {
         $site_linki = $_POST["site_linki"];
      } else {
         $site_linki = "";
      }
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

      if(($ayar_title == "") or ($site_linki == "") or ($ayar_description == "") or ($ayar_keywords == "") or ($ayar_author == "")) {
         header("Location: ../production/generalP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET ayar_title = ?, site_linki = ?, ayar_description = ?, ayar_keywords = ?, ayar_author = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$ayar_title, $site_linki, $ayar_description, $ayar_keywords, $ayar_author]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../production/generalP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../production/generalP.php?status=ok");
            exit();
         } else {
            header("Location: ../production/generalP.php?status=no");
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
         header("Location: ../production/contactP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET ayar_tel = ?, ayar_gsm = ?, ayar_faks = ?, ayar_mail = ?, ayar_seher = ?,ayar_rayon = ?, ayar_adres = ?, ayar_mesai = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$ayar_tel, $ayar_gsm, $ayar_faks, $ayar_mail, $ayar_seher, $ayar_rayon, $ayar_adres, $ayar_mesai]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../production/contactP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../production/contactP.php?status=ok");
            exit();
         } else {
            header("Location: ../production/contactP.php?status=no");
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
         header("Location: ../production/apiP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET ayar_maps = ?, ayar_analystic = ?, ayar_zopim = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$ayar_maps, $ayar_analystic, $ayar_zopim]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../production/apiP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../production/apiP.php?status=ok");
            exit();
         } else {
            header("Location: ../production/apiP.php?status=no");
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
         header("Location: ../production/mailP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET smtp_user = ?, ayar_smtpport = ?, ayar_smtphost = ?, ayar_smtppassword = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$smtp_user, $ayar_smtpport, $ayar_smtphost, $ayar_smtppassword,]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../production/mailP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../production/mailP.php?status=ok");
            exit();
         } else {
            header("Location: ../production/mailP.php?status=no");
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
         header("Location: ../production/socialP.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE ayarlar SET ayar_facebook = ?, ayar_twitter = ?, ayar_google = ?, ayar_youtube = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$ayar_facebook, $ayar_twitter, $ayar_google, $ayar_youtube]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../production/socialP.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../production/socialP.php?status=ok");
            exit();
         } else {
            header("Location: ../production/socialP.php?status=no");
            exit();
         }
      }
      

   }


   if(isset($_POST["about"])) {
      if(isset($_POST["about_title"])) {
         $about_title = $_POST["about_title"];
      } else {
         $about_title = "";
      }

      if(isset($_POST["about_desc"])) {
         $about_desc = $_POST["about_desc"];
      } else {
         $about_desc = "";
      }

      if(isset($_POST["about_video"])) {
         $about_video = $_POST["about_video"];
      } else {
         $about_video = "";
      }

      if(isset($_POST["about_vizyon"])) {
         $about_vizyon = $_POST["about_vizyon"];
      } else {
         $about_vizyon = "";
      }

      if(isset($_POST["about_misyon"])) {
         $about_misyon = $_POST["about_misyon"];
      } else {
         $about_misyon = "";
      }
      if(($about_title == "") or ($about_desc == "") or ($about_video == "") or ($about_vizyon == "") or ($about_misyon == "")) {
         header("Location: ../production/about.php?status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE about SET about_title = ?, about_desc = ?, about_video = ?, about_vizyon = ?, about_misyon = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$about_title, $about_desc, $about_video, $about_vizyon, $about_misyon]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../production/about.php?status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../production/about.php?status=ok");
            exit();
         } else {
            header("Location: ../production/about.php?status=no");
            exit();
         }
      }
      

   }





   if(isset($_POST["admingiris"])) {
      if(isset($_POST["user_email"])) {
         $user_email = $_POST["user_email"];
      } else {
         $user_email = "";
      }

      if(isset($_POST["user_pass"])) {
         $user_pass = md5($_POST["user_pass"]);
      } else {
         $user_pass = "";
      }

 
      if(($user_email == "") or ($user_email == "")) {
         header("Location: ../production/login.php?status=empty");
         exit();
      } else {
         $adminGirisSorgusu = $db->prepare("SELECT * FROM users WHERE user_email = ? AND user_pass = ? AND user_yetki = ?");
         $adminIf = $adminGirisSorgusu->execute([$user_email, $user_pass, 5]);
         $adminCount = $adminGirisSorgusu->rowCount();
     
         if(!$adminIf) {
            header("Location: ../production/login.php?status=error");
            exit();
         };
         if($adminCount > 0) {
            $_SESSION["admin_mail"] = $user_email;
            header("Location: ../production/index.php");
            exit();
         } else {
            header("Location: ../production/login.php?status=no");
            exit();
         }
      }
      

   }



   if(isset($_POST["gullaniciguncelle"])) {
      if(isset($_POST["user_id"])) {
         $user_id = $_POST["user_id"];
      } else {
         $user_id = "";
      }

 
      if(isset($_POST["user_tc"])) {
         $user_tc = $_POST["user_tc"];
      } else {
         $user_tc = "";
      }
      if(isset($_POST["user_name"])) {
         $user_name = $_POST["user_name"];
      } else {
         $user_name = "";
      }
      if(isset($_POST["user_durum"])) {
         $user_durum = $_POST["user_durum"];
      } else {
         $user_durum = "";
      }
      
      if(($user_id == "") or ($user_tc == "") or ($user_name == "") or ($user_durum == "")) {
         header("Location: ../production/user-update.php?userid=$user_id&status=empty");
         exit();
      } else {
         $adminGirisSorgusu = $db->prepare("UPDATE users SET user_tc = ?,  user_name = ?, user_durum = ? WHERE user_id = ? ");
         $adminIf = $adminGirisSorgusu->execute([$user_tc, $user_name, $user_durum, $user_id]);
         $adminCount = $adminGirisSorgusu->rowCount();
     
         if(!$adminIf) {
            header("Location: ../production/user-update.php?userid=$user_id?status=error");
            exit();
         };
         if($adminCount > 0) {
            header("Location: ../production/user-update.php?userid=$user_id");
            exit();
         } else {
             header("Location: ../production/user-update.php?userid=$user_id?status=no");
            exit();
         }
      }
      

   }


   if(isset(($_GET["kullanicisil"]))) {
      if($_GET["kullanicisil"] == "ok") {
         if(isset($_GET["userid"])) {
            $userid = $_GET["userid"];
         } else {
            $userid = "";
         }
   
     
   
    
         if(($userid == "")) {
            header("Location: ../production/users.php?status=empty");
            exit();
         } else {
            $adminGirisSorgusu = $db->prepare("DELETE FROM users WHERE user_id = ?");
            $adminIf = $adminGirisSorgusu->execute([$userid]);
            $adminCount = $adminGirisSorgusu->rowCount();
        
            if(!$adminIf) {
               header("Location: ../production/users.php?status=error");
               exit();
            };
            if($adminCount > 0) {
               header("Location: ../production/users.php");
               exit();
            } else {
               header("Location: ../production/users.php?status=no");
               exit();
            }
         }
         
   
      }
   }




   if(isset($_POST["menuguncelle"])) {
      include_once("functions.php");
      if(isset($_POST["menu_id"])) {
         $menu_id = $_POST["menu_id"];
      } else {
         $menu_id = "";
      }

 
      if(isset($_POST["menu_ad"])) {
         $menu_ad = $_POST["menu_ad"];
         $seo_url = seo($_POST["menu_ad"]);
      } else {
         $menu_ad = "";
         $seo_url = "";
      }
      if(isset($_POST["menu_detay"])) {
         $menu_detay = $_POST["menu_detay"];
      } else {
         $menu_detay = "";
      }
      if(isset($_POST["menu_durum"])) {
         $menu_durum = $_POST["menu_durum"];
      } else {
         $menu_durum = "";
      }
      if(isset($_POST["menu_url"])) {
         $menu_url = $_POST["menu_url"];
      } else {
         $menu_url = "";
      }
      if(isset($_POST["menu_sira"])) {
         $menu_sira = $_POST["menu_sira"];
      } else {
         $menu_sira = "";
      }
      if(($menu_id == "") or ($menu_ad == "") or ($menu_detay == "") or ($menu_durum == "") or ($menu_sira == "")) {
         header("Location: ../production/menu-duzenle.php?menuid=$menu_id&status=empty");
         exit();
      } else {
         $adminGirisSorgusu = $db->prepare("UPDATE menuler SET menu_ad = ?,  menu_detay = ?, menu_durum = ?, menu_url = ?, menu_sira = ?, menu_seourl = ? WHERE menu_id = ? ");
         $adminIf = $adminGirisSorgusu->execute([$menu_ad, $menu_detay, $menu_durum, $menu_url, $menu_sira, $seo_url, $menu_id]);
         $adminCount = $adminGirisSorgusu->rowCount();
     
         if(!$adminIf) {
            header("Location: ../production/menu-duzenle.php?menuid=$menu_id?status=error");
            exit();
         };
         if($adminCount > 0) {
            header("Location: ../production/menu-duzenle.php?menuid=$menu_id");
            exit();
         } else {
             header("Location: ../production/menu-duzenle.php?menuid=$menu_id?status=no");
            exit();
         }
      }
      

   }




   if(isset($_GET["menusil"])) {
      if($_GET["menusil"] == "ok") {
         if(isset($_GET["menuid"])) {
            $menuid = $_GET["menuid"];
         } else {
            $menuid = "";
         }
   
     
   
    
         if(($menuid == "")) {
            header("Location: ../production/menuler.php?status=empty");
            exit();
         } else {
            $menuSilSorgusu = $db->prepare("DELETE FROM menuler WHERE menu_id = ?");
            $menuIf = $menuSilSorgusu->execute([$menuid]);
            $silinmisMenuSayi = $menuSilSorgusu->rowCount();
        
            if(!$menuIf) {
               header("Location: ../production/menuler.php?status=error");
               exit();
            };
            if($silinmisMenuSayi > 0) {
               header("Location: ../production/menuler.php");
               exit();
            } else {
               header("Location: ../production/menuler.php?status=no");
               exit();
            }
         }
         
   
      }
   }


   if(isset($_POST["menyuekle"])) {
    
      include_once("functions.php");


 
      if(isset($_POST["menu_ad"])) {
         $menu_ad = $_POST["menu_ad"];
         $seo_url = seo($_POST["menu_ad"]);
      } else {
         $menu_ad = "";
         $seo_url = "";
      }
      if(isset($_POST["menu_detay"])) {
         $menu_detay = $_POST["menu_detay"];
      } else {
         $menu_detay = "";
      }
      if(isset($_POST["menu_durum"])) {
         $menu_durum = $_POST["menu_durum"];
      } else {
         $menu_durum = "";
      }
      if(isset($_POST["menu_url"])) {
         $menu_url = $_POST["menu_url"];
      } else {
         $menu_url = "";
      }
      if(isset($_POST["menu_sira"])) {
         $menu_sira = $_POST["menu_sira"];
      } else {
         $menu_sira = "";
      }
      if(($menu_ad == "") or ($menu_detay == "") or ($menu_durum == "") or ($menu_sira == "")) {
         header("Location: ../production/menuler.php?status=empty");
         exit();
      } else {
         $menyuekleSorgusu = $db->prepare("INSERT INTO menuler(menu_ad, menu_detay, menu_durum, menu_url, menu_sira, menu_seourl) VALUES(?, ?, ?, ?, ?, ?)");
         $menuIf = $menyuekleSorgusu->execute([$menu_ad, $menu_detay, $menu_durum, $menu_url, $menu_sira, $seo_url]);
         $eklenenMenyuCount = $menyuekleSorgusu->rowCount();
     
         if(!$menuIf) {
            header("Location: ../production/menuler.php?status=error");
            exit();
         };
         if($eklenenMenyuCount > 0) {
            header("Location: ../production/menuler.php?status=ok");
            exit();
         } else {
             header("Location: ../production/menuler.php");
            exit();
         }
      }
      

   }
   if (isset($_POST['logoduzenle'])) {

	

      $uploads_dir = '../../dimg';
   
      @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
      @$name = $_FILES['ayar_logo']["name"];
   
      $benzersizsayi4=rand(20000,32000);
      $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
      @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
   
      
      $duzenle=$db->prepare("UPDATE ayarlar SET
         ayar_logo=:logo
         WHERE id=1");
      $update=$duzenle->execute(array(
         'logo' => $refimgyol
         ));
   
   
   
      if ($update) {
   
         $resimsilunlink=$_POST['eski_yol'];
         unlink("../../$resimsilunlink");
   
         Header("Location:../production/generalP.php?durum=ok");
   
      } else {
   
         Header("Location:../production/generalP.php?durum=no");
      }
   
   }


   if (isset($_POST['sliderkaydet'])) {


      $uploads_dir = '../../dimg/';
      @$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
      @$name = $_FILES['slider_resimyol']["name"];
      //resmin isminin benzersiz olması
      $benzersizsayi1=rand(20000,32000);
      $benzersizsayi2=rand(20000,32000);
      $benzersizsayi3=rand(20000,32000);
      $benzersizsayi4=rand(20000,32000);	
      $benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
      $refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
      @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
      
   
   
      $kaydet=$db->prepare("INSERT INTO carusel SET
         slider_ad=:slider_ad,
         slider_sira=:slider_sira,
         slider_link=:slider_link,
         slider_src=:slider_src
         ");
      $insert=$kaydet->execute(array(
         'slider_ad' => $_POST['slider_ad'],
         'slider_sira' => $_POST['slider_sira'],
         'slider_link' => $_POST['slider_link'],
         'slider_src' => $refimgyol
         ));
   
      if ($insert) {
   
         Header("Location:../production/slider.php?durum=ok");
   
      } else {
   
         Header("Location:../production/slider.php?durum=no");
      }
   
   }



   if(isset($_POST["sliderduzenle"])) {
      if(isset($_POST["slider_id"])) {
         $slider_id = $_POST["slider_id"];
      } else {
         $slider_id = "";
      }
 
      if(isset($_POST["slider_ad"])) {
         $slider_ad = $_POST["slider_ad"];
      } else {
         $slider_ad = "";
      }

      if(isset($_POST["slider_link"])) {
         $slider_link = $_POST["slider_link"];
      } else {
         $slider_link = "";
      }

      if(isset($_POST["slider_sira"])) {
         $slider_sira = $_POST["slider_sira"];
      } else {
         $slider_sira = "";
      }
      if(isset($_POST["slider_durum"])) {
         $slider_durum = $_POST["slider_durum"];
      } else {
         $slider_durum = "";
      }
    

      if(($slider_ad == "") or ($slider_link == "") or ($slider_sira == "") or ($slider_durum == "")) {
         header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE carusel SET slider_ad = ?, slider_link = ?, slider_sira = ?, slider_durum = ? WHERE slider_id = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$slider_ad, $slider_link, $slider_sira, $slider_durum, $slider_id]);
         $deyisenAyarlar = $genelAyarlariYenilemeSorgusu->rowCount();
         if(!$ayarIf) {
            header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&status=error");
            exit();
         };
         if($deyisenAyarlar > 0) {
            header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&status=ok");
            exit();
         } else {
            header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&status=no");
            exit();
         }
      }
      

   }

   if (isset($_POST['caruselresimduzenle'])) {

      if(isset($_POST["slider_id"])) {
         $slider_id = $_POST["slider_id"];
      } else {
         header("Location:../production/slider");
      }
      if($_FILES['slider_img']["error"] = 4) {
         header("Location:../production/slider-duzenle.php?slider_id=$slider_id&status=ok");
         exit();
      }
      $uploads_dir = '../../dimg';
   
      @$tmp_name = $_FILES['slider_img']["tmp_name"];
      @$name = $_FILES['slider_img']["name"];
   
      $benzersizsayi4=rand(20000,32000);
      $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
      @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
   
      
      $duzenle=$db->prepare("UPDATE carusel SET slider_src= ? WHERE slider_id= ?");
      $update=$duzenle->execute(array($refimgyol, $slider_id));
   
  
   
      if ($update) {
   
         $resimsilunlink=$_POST['eski_yol'];
         unlink("../../$resimsilunlink");
   
         header("Location:../production/slider-duzenle.php?slider_id=$slider_id&status=ok");
   
      } else {
   
         header("Location:../production/slider-duzenle.php?slider_id=$slider_id&status=no");
      }
   
   }



   if(isset($_GET["slidersil"])) {
      if($_GET["slidersil"] == "ok") {
         if(isset($_GET["slider_id"])) {
            $slider_id = $_GET["slider_id"];
         } else {
            $slider_id = "";
         }
   
     
   
    
         if(($slider_id == "")) {
            header("Location: ../production/slider.php?status=empty");
            exit();
         } else {
            $menuSilSorgusu = $db->prepare("DELETE FROM carusel WHERE slider_id = ?");
            $update = $menuSilSorgusu->execute([$slider_id]);
       
   
            if ($update) {
      
              
         
               Header("Location:../production/slider-duzenle.php?durum=ok");
         
            } else {
         
               Header("Location:../production/slider-duzenle.php?durum=no");
            }
         
         }
      }
   }



   if (isset($_POST['kullanicikaydet'])) {

	
      echo $kullanici_adsoyad=htmlspecialchars($_POST['kullanici_adsoyad']); echo "<br>";
      echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";
   
      echo $kullanici_passwordone=$_POST['kullanici_passwordone']; echo "<br>";
      echo $kullanici_passwordtwo=$_POST['kullanici_passwordtwo']; echo "<br>";
   

      if ($kullanici_passwordone==$kullanici_passwordtwo) {
         if (strlen($kullanici_passwordone)>=6) {
            $kullanicisor=$db->prepare("SELECT * from users WHERE user_email=:mail");
            $kullanicisor->execute(array(
               'mail' => $kullanici_mail
               ));
   

            $say=$kullanicisor->rowCount();
   
   
   
            if ($say==0) {
               $password=md5($kullanici_passwordone);
               $kullanici_yetki=1;
               $kullanicikaydet=$db->prepare("INSERT INTO users(user_name, user_email, user_pass, user_yetki) VALUES (?, ?, ?, ?)");
               $insert=$kullanicikaydet->execute([$kullanici_adsoyad, $kullanici_mail, $password, $kullanici_yetki]);
   
               if ($insert) {
                  header("Location:../../index.php?durum=loginbasarili");
               } else {
   
                  header("Location:../../register.php?durum=basarisiz");
               }
   
            } else {
               header("Location:../../register.php?durum=mukerrerkayit");
            }
         } else {
            header("Location:../../register.php?durum=eksiksifre");
         }
      } else {
         header("Location:../../register.php?durum=farklisifre");
      }
      
   
   
   }



   if(isset($_POST["userenter"])) {
      if(isset($_POST["username"])) {
         $username = $_POST["username"];
      } else {
         $username = "";
      }

      if(isset($_POST["password"])) {
         $password = md5($_POST["password"]);
      } else {
         $password = "";
      }

      
 
         $userGirisSorgusu = $db->prepare("SELECT * FROM users WHERE user_email = ? AND user_pass = ? AND user_yetki = ?");
         $userIf = $userGirisSorgusu->execute([$username, $password, 1]);
         $userCount = $userGirisSorgusu->rowCount();
        
         if($userCount == 1) {
            $_SESSION["user"] = $username;
            header("Location: ../../");
            exit();
         } else {
            header("Location: ../../?durum=basarisiz");
            exit();
         };
   }
      
   if(isset($_POST["kullaniciyenile"])) {
      $gelen_id  = $_POST["user_id"];
      $gelen_name = $_POST["user_name"];
      $gelen_email = $_POST["user_email"];
      $gelen_gsm = $_POST["user_gsm"];
      $gelen_tel = $_POST["user_tel"];
      $gelen_pass = md5($_POST["user_pass"]);
      $gelen_adres = $_POST["user_adres"];
      $gelen_seher = $_POST["user_seher"];
      $gelen_rayon = $_POST["user_rayon"];
      $gelen_unvan = $_POST["user_unvan"];
      $user_tc = $_POST["user_tc"];
      $yoxlamaSorgusu = $db->prepare("SELECT * FROM users WHERE user_email = ?");
      $yoxlamaSorgusu->execute([$gelen_email]);
      $yoxlamaCount = $yoxlamaSorgusu->rowCount();
      $yoxlama = $yoxlamaSorgusu->fetch(PDO::FETCH_ASSOC);
      if($yoxlamaCount > 0) {
         if($gelen_email !== $_SESSION["user"]) {
            header("Location: ../../hesabim.php?status=same");
         } else {
            $kullaniciSorgusu = $db->prepare("UPDATE users SET user_tc = ?, user_name = ?, user_email = ?, user_gsm = ?, user_tel = ?, user_pass = ?, user_adres = ?, user_seher = ?, user_rayon = ?, user_unvan = ? WHERE user_id = ?");
            $kullanicidogrulama = $kullaniciSorgusu->execute([$user_tc, $gelen_name, $gelen_email, $gelen_gsm, $gelen_tel, $gelen_pass, $gelen_adres, $gelen_seher, $gelen_rayon, $gelen_unvan, $gelen_id]);
            $say = $kullaniciSorgusu->rowCount();
            if($say > 0) {
               $_SESSION["user"] = $gelen_email;
            }
      
            if(!$kullanicidogrulama) {
               header("Location: ../../hesabim.php?status=no");
            } else {
               header("Location: ../../hesabim.php?status=ok");
            }
         }
      } else {

         $kullaniciSorgusu = $db->prepare("UPDATE users SET user_tc = ?, user_name = ?, user_email = ?, user_gsm = ?, user_tel = ?, user_pass = ?, user_adres = ?, user_seher = ?, user_rayon = ?, user_unvan = ? WHERE user_id = ?");
         $kullanicidogrulama = $kullaniciSorgusu->execute([$user_tc, $gelen_name, $gelen_email, $gelen_gsm, $gelen_tel, $gelen_pass, $gelen_adres, $gelen_seher, $gelen_rayon, $gelen_unvan, $gelen_id]);
         $say = $kullaniciSorgusu->rowCount();
         if($say > 0) {
            $_SESSION["user"] = $gelen_email;
         }
   
         if(!$kullanicidogrulama) {
            header("Location: ../hesabim.php?status=no");
         } else {
            header("Location: ../../hesabim.php?status=ok");
         }
      }

   }
   if (isset($_POST['kategoriduzenle'])) {

      $kategori_id=$_POST['category_id'];
      $kategori_seourl=seo($_POST['category_ad']);
     
      
      $kaydet=$db->prepare("UPDATE categories SET category_ad=?, keteqori_durum=?,	 category_seourl=?, category_sira=? WHERE category_id=?");
      $update=$kaydet->execute(array($_POST['category_ad'], $_POST['keteqori_durum'], $kategori_seourl,$_POST['category_sira'], $kategori_id));
   
      if ($update) {
   
         Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");
   
      } else {
   
         Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
      }
   
   }




   if ($_GET['kategorisil']=="ok") {
	
      $sil=$db->prepare("DELETE from categories where category_id=:category_id");
      $kontrol=$sil->execute(array(
         'category_id' => $_GET['kategori_id']
         ));
   
      if ($kontrol) {
   
         Header("Location:../production/kategori.php?durum=ok");
   
      } else {
   
         Header("Location:../production/kategori.php?durum=no");
      }
   
   }




   if (isset($_POST['kategoriekle'])) {

      $kategori_seourl=seo($_POST['kategori_ad']);
   
      $kaydet=$db->prepare("INSERT INTO categories SET category_ad=?, keteqori_durum=?, category_seourl= ?, category_sira=?");
      $insert=$kaydet->execute(array($_POST['kategori_ad'], $_POST['kategori_durum'], $kategori_seourl, $_POST['kategori_sira']));
   
      if ($insert) {
   
         Header("Location:../production/kategori.php?durum=ok");
   
      } else {
   
         Header("Location:../production/kategori.php?durum=no");
      }
   
   }
?>