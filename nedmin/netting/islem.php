<?php
   ob_start();
   session_start();
   require_once("./baglan.php");
   require_once('./functions.php');
   if(isset($_POST["general"])) {
      controll();
      if(isset($_POST["site_linki"])) {
         $site_linki = strip_tags(htmlspecialchars($_POST["site_linki"]));
      } else {
         $site_linki = "";
      }
      if(isset($_POST["ayar_title"])) {
         $ayar_title = strip_tags(htmlspecialchars($_POST["ayar_title"]));
      } else {
         $ayar_title = "";
      }

      if(isset($_POST["ayar_description"])) {
         $ayar_description = strip_tags(htmlspecialchars($_POST["ayar_description"]));
      } else {
         $ayar_description = "";
      }

      if(isset($_POST["ayar_keywords"])) {
         $ayar_keywords = strip_tags(htmlspecialchars($_POST["ayar_keywords"]));
      } else {
         $ayar_keywords = "";
      }

      if(isset($_POST["ayar_author"])) {
         $ayar_author = strip_tags(htmlspecialchars($_POST["ayar_author"]));
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
      controll();
      if(isset($_POST["ayar_tel"])) {
         $ayar_tel = strip_tags(htmlspecialchars($_POST["ayar_tel"]));
      } else {
         $ayar_tel = "";
      }

      if(isset($_POST["ayar_gsm"])) {
         $ayar_gsm = strip_tags(htmlspecialchars($_POST["ayar_gsm"]));
      } else {
         $ayar_gsm = "";
      }

      if(isset($_POST["ayar_faks"])) {
         $ayar_faks = strip_tags(htmlspecialchars($_POST["ayar_faks"]));
      } else {
         $ayar_faks = "";
      }

      if(isset($_POST["ayar_mail"])) {
         $ayar_mail = strip_tags(htmlspecialchars($_POST["ayar_mail"]));
      } else {
         $ayar_mail = "";
      }
      if(isset($_POST["ayar_seher"])) {
         $ayar_seher = strip_tags(htmlspecialchars($_POST["ayar_seher"]));
      } else {
         $ayar_seher = "";
      }
      if(isset($_POST["ayar_rayon"])) {
         $ayar_rayon = strip_tags(htmlspecialchars($_POST["ayar_rayon"]));
      } else {
         $ayar_rayon = "";
      }

      if(isset($_POST["ayar_adres"])) {
         $ayar_adres = strip_tags(htmlspecialchars($_POST["ayar_adres"]));
      } else {
         $ayar_adres = "";
      }

      if(isset($_POST["ayar_mesai"])) {
         $ayar_mesai = strip_tags(htmlspecialchars($_POST["ayar_mesai"]));
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
      controll();
      if(isset($_POST["ayar_maps"])) {
         $ayar_maps = strip_tags(htmlspecialchars($_POST["ayar_maps"]));
      } else {
         $ayar_maps = "";
      }

      if(isset($_POST["ayar_analystic"])) {
         $ayar_analystic = strip_tags(htmlspecialchars($_POST["ayar_analystic"]));
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
      controll();
      if(isset($_POST["smtp_user"])) {
         $smtp_user = strip_tags(htmlspecialchars($_POST["smtp_user"]));
      } else {
         $smtp_user = "";
      }
      if(isset($_POST["ayar_smtpport"])) {
         $ayar_smtpport = strip_tags(htmlspecialchars($_POST["ayar_smtpport"]));
      } else {
         $ayar_smtpport = "";
      }

      if(isset($_POST["ayar_smtphost"])) {
         $ayar_smtphost = strip_tags(htmlspecialchars($_POST["ayar_smtphost"]));
      } else {
         $ayar_smtphost = "";
      }

      if(isset($_POST["ayar_smtppassword"])) {
         $ayar_smtppassword = strip_tags(htmlspecialchars($_POST["ayar_smtppassword"]));
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
      controll();
      if(isset($_POST["ayar_facebook"])) {
         $ayar_facebook = strip_tags(htmlspecialchars($_POST["ayar_facebook"]));
      } else {
         $ayar_facebook = "";
      }

      if(isset($_POST["ayar_twitter"])) {
         $ayar_twitter = strip_tags(htmlspecialchars($_POST["ayar_twitter"]));
      } else {
         $ayar_twitter = "";
      }

      if(isset($_POST["ayar_google"])) {
         $ayar_google = strip_tags(htmlspecialchars($_POST["ayar_google"]));
      } else {
         $ayar_google = "";
      }

      if(isset($_POST["ayar_youtube"])) {
         $ayar_youtube = strip_tags(htmlspecialchars($_POST["ayar_youtube"]));
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
      controll();
      if(isset($_POST["about_title"])) {
         $about_title = strip_tags(htmlspecialchars($_POST["about_title"]));
      } else {
         $about_title = "";
      }

      if(isset($_POST["about_desc"])) {
         $about_desc = strip_tags(htmlspecialchars($_POST["about_desc"]));
      } else {
         $about_desc = "";
      }

      if(isset($_POST["about_video"])) {
         $about_video = strip_tags(htmlspecialchars($_POST["about_video"]));
      } else {
         $about_video = "";
      }

      if(isset($_POST["about_vizyon"])) {
         $about_vizyon = strip_tags(htmlspecialchars($_POST["about_vizyon"]));
      } else {
         $about_vizyon = "";
      }

      if(isset($_POST["about_misyon"])) {
         $about_misyon = strip_tags(htmlspecialchars($_POST["about_misyon"]));
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
         $user_email = strip_tags(htmlspecialchars($_POST["user_email"]));
      } else {
         $user_email = "";
      }

      if(isset($_POST["user_pass"])) {
         $user_pass = md5(strip_tags(htmlspecialchars($_POST["user_pass"])));
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
      controll();
      if(isset($_POST["user_id"])) {
         $user_id = strip_tags(htmlspecialchars($_POST["user_id"]));
      } else {
         $user_id = "";
      }

 
      if(isset($_POST["user_tc"])) {
         $user_tc = strip_tags(htmlspecialchars($_POST["user_tc"]));
      } else {
         $user_tc = "";
      }
      if(isset($_POST["user_name"])) {
         $user_name = strip_tags(htmlspecialchars($_POST["user_name"]));
      } else {
         $user_name = "";
      }
      if(isset($_POST["user_durum"])) {
         $user_durum = strip_tags(htmlspecialchars($_POST["user_durum"]));
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
      controll();
      if($_GET["kullanicisil"] == "ok") {
         if(isset($_GET["userid"])) {
            $userid = strip_tags(htmlspecialchars($_GET["userid"]));
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
               $sepetinibosalt = $db->prepare("DELETE FROM sepet WHERE kullanici_id = ?");
               $sepetinibosalt->execute([$userid]);
               $siparisleribosalt = $db->prepare("DELETE FROM siparis WHERE kullanici_id = ?");
               $siparisleribosalt->execute([$userid]);
               $yorumlaribosalt = $db->prepare("DELETE FROM yorumlar WHERE kullanici_id = ?");
               $yorumlaribosalt->execute([$userid]);
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
      controll();
      include_once("functions.php");
      if(isset($_POST["menu_id"])) {
         $menu_id = strip_tags(htmlspecialchars($_POST["menu_id"]));
      } else {
         $menu_id = "";
      }

 
      if(isset($_POST["menu_ad"])) {
         $menu_ad = $_POST["menu_ad"];
         $seo_url = seo(strip_tags(htmlspecialchars($_POST["menu_ad"])));
      } else {
         $menu_ad = "";
         $seo_url = "";
      }
      if(isset($_POST["menu_detay"])) {
         $menu_detay = strip_tags(htmlspecialchars($_POST["menu_detay"]));
      } else {
         $menu_detay = "";
      }
      if(isset($_POST["menu_durum"])) {
         $menu_durum = strip_tags(htmlspecialchars($_POST["menu_durum"]));
      } else {
         $menu_durum = "";
      }
      if(isset($_POST["menu_url"])) {
         $menu_url = strip_tags(htmlspecialchars($_POST["menu_url"]));
      } else {
         $menu_url = "";
      }
      if(isset($_POST["menu_sira"])) {
         $menu_sira = strip_tags(htmlspecialchars($_POST["menu_sira"]));
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
      controll();
      if($_GET["menusil"] == "ok") {
         if(isset($_GET["menuid"])) {
            $menuid = strip_tags(htmlspecialchars($_GET["menuid"]));
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
      controll();
      include_once("functions.php");


 
      if(isset($_POST["menu_ad"])) {
         $menu_ad = $_POST["menu_ad"];
         $seo_url = seo(strip_tags(htmlspecialchars($_POST["menu_ad"])));
      } else {
         $menu_ad = "";
         $seo_url = "";
      }
      if(isset($_POST["menu_detay"])) {
         $menu_detay = strip_tags(htmlspecialchars($_POST["menu_detay"]));
      } else {
         $menu_detay = "";
      }
      if(isset($_POST["menu_durum"])) {
         $menu_durum = strip_tags(htmlspecialchars($_POST["menu_durum"]));
      } else {
         $menu_durum = "";
      }
      if(isset($_POST["menu_url"])) {
         $menu_url = strip_tags(htmlspecialchars($_POST["menu_url"]));
      } else {
         $menu_url = "";
      }
      if(isset($_POST["menu_sira"])) {
         $menu_sira = strip_tags(htmlspecialchars($_POST["menu_sira"]));
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
      controll();
      
      $yesFormat = ["png", "jpg", "jpeg"];
      $format = explode("/", $_FILES['ayar_logo']["type"])[1];
      


        if(in_array($format, $yesFormat)){
            echo $format;
        } else {
         Header("Location:../production/generalP.php?durum=wrongformat");
         exit();
        }


      if($_FILES['ayar_logo']["size"] > 1048576) {
         Header("Location:../production/generalP.php?durum=bigsize");
         exit();
      }
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
         exit();
   
      } else {
   
         Header("Location:../production/generalP.php?durum=no");
         exit();
      }
   
   }


   if (isset($_POST['sliderkaydet'])) {
      controll();
      $yesFormat = ["png", "jpg", "jpeg"];
      $format = explode("/", $_FILES['slider_resimyol']["type"])[1];
      


        if(in_array($format, $yesFormat)){
            echo $format;
        } else {
         Header("Location:../production/slider-ekle?durum=wrongformat");
         exit();
        }


      if($_FILES['slider_resimyol']["size"] > 1048576) {
         Header("Location:../production/slider-ekle?durum=bigsize");
         exit();
      }

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
         slider_src=:slider_src,
         urun_id=:urun_id,
         slider_detay=:slider_detay
         ");
      $insert=$kaydet->execute(array(
         'slider_ad' => strip_tags(htmlspecialchars($_POST['slider_ad'])),
         'slider_sira' => strip_tags(htmlspecialchars($_POST['slider_sira'])),
         'slider_link' => strip_tags(htmlspecialchars($_POST['slider_link'])),
         'slider_src' => $refimgyol,
         'urun_id' => strip_tags(htmlspecialchars($_POST['urun_id'])),
         'slider_detay' => strip_tags(htmlspecialchars($_POST['slider_detay'])),
         ));
   
      if ($insert) {
   
         Header("Location:../production/slider.php?durum=ok");
   
      } else {
   
         Header("Location:../production/slider.php?durum=no");
      }
   
   }



   if(isset($_POST["sliderduzenle"])) {
      controll();
      if(isset($_POST["slider_id"])) {
         $slider_id = strip_tags(htmlspecialchars($_POST["slider_id"]));
      } else {
         $slider_id = "";
      }
 
      if(isset($_POST["slider_ad"])) {
         $slider_ad = strip_tags(htmlspecialchars($_POST["slider_ad"]));
      } else {
         $slider_ad = "";
      }

      if(isset($_POST["slider_link"])) {
         $slider_link = strip_tags(htmlspecialchars($_POST["slider_link"]));
      } else {
         $slider_link = "";
      }

      if(isset($_POST["slider_sira"])) {
         $slider_sira = strip_tags(htmlspecialchars($_POST["slider_sira"]));
      } else {
         $slider_sira = "";
      }
      if(isset($_POST["slider_durum"])) {
         $slider_durum = strip_tags(htmlspecialchars($_POST["slider_durum"]));
      } else {
         $slider_durum = "";
      }
      if(isset($_POST["urun_id"])) {
         $urun_id = strip_tags(htmlspecialchars($_POST["urun_id"]));
      } else {
         $urun_id = "";
      }
      if(isset($_POST["slider_detay"])) {
         $slider_detay = strip_tags(htmlspecialchars($_POST["slider_detay"]));
      } else {
         $slider_detay = "";
      }

      if(($slider_ad == "") or ($slider_sira == "") or ($slider_durum == "") or ($urun_id == "")) {
         header("Location: ../production/slider-duzenle.php?slider_id=$slider_id&status=empty");
         exit();
      } else {
         $genelAyarlariYenilemeSorgusu = $db->prepare("UPDATE carusel SET slider_detay = ?, urun_id = ?, slider_ad = ?, slider_link = ?, slider_sira = ?, slider_durum = ? WHERE slider_id = ?");
         $ayarIf = $genelAyarlariYenilemeSorgusu->execute([$slider_detay, $urun_id, $slider_ad, $slider_link, $slider_sira, $slider_durum, $slider_id]);
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
      controll();
      $yesFormat = ["png", "jpg", "jpeg"];
      $format = explode("/", $_FILES['slider_img']["type"])[1];
      
      if(isset($_POST["slider_id"])) {
         
         $slider_id = $_POST["slider_id"];
         if(in_array($format, $yesFormat)){
            echo $format;
        } else {
         header("Location:../production/slider-duzenle.php?slider_id=$slider_id&status=wrongformat");
         exit();
        }


      if($_FILES['slider_img']["size"] > 1048576) {
         header("Location:../production/slider-duzenle.php?slider_id=$slider_id&status=bigsize");
         exit();
      }
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
      controll();
      if($_GET["slidersil"] == "ok") {
         if(isset($_GET["slider_id"])) {
            $slider_id = strip_tags(htmlspecialchars($_GET["slider_id"]));
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
         $username = strip_tags(htmlspecialchars($_POST["username"]));
      } else {
         $username = "";
      }

      if(isset($_POST["password"])) {
         $password = md5(strip_tags(htmlspecialchars($_POST["password"])));
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
      $gelen_id  = strip_tags(htmlspecialchars($_POST["user_id"]));
      $gelen_name = strip_tags(htmlspecialchars($_POST["user_name"]));
      $gelen_email = strip_tags(htmlspecialchars($_POST["user_email"]));
      $gelen_gsm = strip_tags(htmlspecialchars($_POST["user_gsm"]));
      $gelen_tel = strip_tags(htmlspecialchars($_POST["user_tel"]));
      $gelen_pass = md5(strip_tags(htmlspecialchars($_POST["user_pass"])));
      $gelen_adres = strip_tags(htmlspecialchars($_POST["user_adres"]));
      $gelen_seher = strip_tags(htmlspecialchars($_POST["user_seher"]));
      $gelen_rayon = strip_tags(htmlspecialchars($_POST["user_rayon"]));
      $gelen_unvan = strip_tags(htmlspecialchars($_POST["user_unvan"]));
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
      controll();
      $kategori_id=strip_tags(htmlspecialchars($_POST['category_id']));
      $kategori_seourl=seo(strip_tags(htmlspecialchars($_POST['category_ad'])));
     
      
      $kaydet=$db->prepare("UPDATE categories SET category_ad=?, keteqori_durum=?,	 category_seourl=?, category_sira=? WHERE category_id=?");
      $update=$kaydet->execute(array($_POST['category_ad'], $_POST['keteqori_durum'], $kategori_seourl,$_POST['category_sira'], $kategori_id));
   
      if ($update) {
   
         Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");
   
      } else {
   
         Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
      }
   
   }




   if ($_GET['kategorisil']=="ok") {
      $kategorileregit = $db->prepare("SELECT altkategoriler FROM categories WHERE altkategoriler LIKE ?");
      $kategorileregit->execute(["%".$_GET['kategori_id']."%"]);
      $lazimkategori = $kategorileregit->fetch(PDO::FETCH_ASSOC);
      $lazimsoz=",".$_GET['kategori_id'];
      $reg = str_replace($lazimsoz, "",  $lazimkategori["altkategoriler"]);
  

      $kategorilerisorgula = $db->prepare("UPDATE categories SET altkategoriler=? WHERE altkategoriler LIKE ?");
      $kategorilerisorgula->execute([$reg, "%".$_GET['kategori_id']."%"]);
      $kategori =  $kategorilerisorgula->fetchall(PDO::FETCH_ASSOC);
    
      controll();
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
  
      controll();
      $kategori_seourl=seo(strip_tags(htmlspecialchars($_POST['kategori_ad'])));
   
      $kaydet=$db->prepare("INSERT INTO categories SET category_ad=?, keteqori_durum=?, category_seourl= ?, category_sira=?, category_ust=?, altkategoriler = ?");
      $insert=$kaydet->execute(array($_POST['kategori_ad'], $_POST['kategori_durum'], $kategori_seourl, $_POST['kategori_sira'], $_POST['kategori'], "empty"));
      $id = $db->lastInsertId();
         
      $update = $db->prepare("UPDATE categories SET altkategoriler = CONCAT(altkategoriler, ',', ?) WHERE category_id = ?");
      $update->execute([$id, $_POST['kategori']]);
      if ($insert) {
         
       
         Header("Location:../production/kategori.php?durum=ok");
   
      } else {
   
         Header("Location:../production/kategori.php?durum=no");
      }
   
   }



   
if ($_GET['urunsil']=="ok") {
   controll();
	$sil=$db->prepare("DELETE from urunler where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => strip_tags(htmlspecialchars($_GET['urun_id']))
		));

	if ($kontrol) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}




if (isset($_POST['urunduzenle'])) {
   controll();
	$urun_id=$_POST['urun_id'];
	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("UPDATE urunler SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_onecikar=:urun_onecikar,
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl,
      discount=:discount		
		WHERE urun_id={$_POST['urun_id']}");
	$update=$kaydet->execute(array(
		'kategori_id' => strip_tags(htmlspecialchars($_POST['kategori_id'])),
		'urun_ad' => strip_tags(htmlspecialchars($_POST['urun_ad'])),
		'urun_detay' => strip_tags(htmlspecialchars($_POST['urun_detay'])),
		'urun_fiyat' => strip_tags(htmlspecialchars($_POST['urun_fiyat'])),
		'urun_video' => strip_tags(htmlspecialchars($_POST['urun_video'])),
		'urun_onecikar' => strip_tags(htmlspecialchars($_POST['urun_onecikar'])),
		'urun_keyword' => strip_tags(htmlspecialchars($_POST['urun_keyword'])),
		'urun_durum' => strip_tags(htmlspecialchars($_POST['urun_durum'])),
		'urun_stok' => strip_tags(htmlspecialchars($_POST['urun_stok'])),
		'seourl' => $urun_seourl,
      'discount' => strip_tags(htmlspecialchars($_POST['discount'])),

		));

	if ($update) {

		Header("Location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");

	} else {

		Header("Location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
	}

}

if (isset($_POST['urunekle'])) {
   controll();
	$urun_seourl=seo($_POST['urun_ad']);
 

	$kaydet=$db->prepare("INSERT INTO urunler SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => strip_tags(htmlspecialchars($_POST['kategori_id'])),
		'urun_ad' => strip_tags(htmlspecialchars($_POST['urun_ad'])),
		'urun_detay' => strip_tags(htmlspecialchars($_POST['urun_detay'])),
		'urun_fiyat' => strip_tags(htmlspecialchars($_POST['urun_fiyat'])),
		'urun_video' => strip_tags(htmlspecialchars($_POST['urun_video'])),
		'urun_keyword' => strip_tags(htmlspecialchars($_POST['urun_keyword'])),
		'urun_durum' => strip_tags(htmlspecialchars($_POST['urun_durum'])),
		'urun_stok' => strip_tags(htmlspecialchars($_POST['urun_stok'])),
		'seourl' => $urun_seourl

		));

	if ($insert) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}




if ($_GET['məhsuluonecikar']=="ok") {
   controll();
	$sil=$db->prepare("UPDATE urunler SET  urun_onecikar=? WHERE urun_id = ?");
	$kontrol=$sil->execute(["1", strip_tags(htmlspecialchars($_GET['urun_id']))]);

	if ($kontrol) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}


if ($_GET['məhsuluonecikar']=="no") {
   controll();
	$sil=$db->prepare("UPDATE urunler SET  urun_onecikar=? WHERE urun_id = ?");
	$kontrol=$sil->execute(["0", strip_tags(htmlspecialchars($_GET['urun_id']))]);

	if ($kontrol) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}




if (isset($_POST['comment'])) {
   $gelen_url = $_POST["url"];
   $gelen_url = explode("?",  $_POST["url"])[0]."?";
	$kommentElaveElemekSorgusu=$db->prepare("INSERT INTO yorumlar  (kullanici_id,yorum_detay, urun_id) VALUES(?, ?, ?)");
	$kommentElaveElemek=$kommentElaveElemekSorgusu->execute([$user_id, $_POST['urun_detay'], $_GET["urun_id"]]);
   $urunlerisorgula = $db->prepare("SELECT * FROM urunler WHERE urun_id = ?");
   $urunlerisorgula->execute([$_GET["urun_id"]]);
   $urun = $urunlerisorgula->fetch(PDO::FETCH_ASSOC);
   $urun_adi = seo($urun["urun_ad"]);
   $urun_id = $urun["urun_id"];
	if ($kommentElaveElemek) {
		header("Location: $gelen_url durum=ok");
	} else {
		header("Location: $gelen_url durum=no");
	}
}


if(isset($_GET["commentisil"])) {
   
   if ($_GET['commentisil']=="ok") {
      $gelen_url = strip_tags(htmlspecialchars($_GET["url"]));

      $gelen_url = explode("? ",  $_GET["url"])[0]."?";
  
   
      $sil=$db->prepare("DELETE from yorumlar where yorum_id = ? AND kullanici_id = ?");
      $kontrol=$sil->execute([strip_tags(htmlspecialchars($_GET["yorum_id"])), $user_id]);
   
      if ($kontrol) {
   
         header("Location: $gelen_url del=ok");
   
      } else {
   
         header("Location: $gelen_url del=ok");
      }
   
   }
}



if (isset($_POST['changecomment'])) {
  
   $gelen_url = $_POST["url"];
   $gelen_url = explode("?",  strip_tags(htmlspecialchars($_POST["url"])))[0]."?";
	$kommentElaveElemekSorgusu=$db->prepare("UPDATE yorumlar SET urun_detay = ? WHERE urun_id = ? AND yorum_id = ? AND kullanici_id = ?");
	$kommentElaveElemek=$kommentElaveElemekSorgusu->execute([]);
   
	if ($kommentElaveElemek) {
		header("Location: $gelen_url durum=ok");
	} else {
		header("Location: $gelen_url durum=no");
	}
}


if (isset($_POST['sepetekle'])) {
   
   $sepetiSorgula = $db->prepare("SELECT * FROM sepet WHERE kullanici_id = ? AND urun_id = ?");
   $sepetiSorgula->execute([$user_id, $_POST['urun_id']]);
   $sepet = $sepetiSorgula->rowCount();
   echo $sepet;
   if($sepet > 0) {
      $sepetiGuncelle = $db->prepare("UPDATE sepet SET urun_adet = urun_adet+? WHERE kullanici_id = ? AND urun_id = ?");
      $update = $sepetiGuncelle->execute([strip_tags(htmlspecialchars($_POST['urun_adet'])), $user_id, strip_tags(htmlspecialchars($_POST['urun_id']))]);
      if ($update) {
         Header("Location:../../sepet?durum=ok");
      } else {
         Header("Location:../../sepet?durum=no");
      }
      } else {
      $urunekle=$db->prepare("INSERT INTO sepet SET
		urun_adet=:urun_adet,
		kullanici_id=:kullanici_id,
		urun_id=:urun_id	
		");
	$insert=$urunekle->execute(array(
		'urun_adet' => strip_tags(htmlspecialchars($_POST['urun_adet'])),
		'kullanici_id' => $user_id,
		'urun_id' => $_POST['urun_id']
		));
	if ($insert) {
		Header("Location:../../sepet?durum=ok");
	} else {
		Header("Location:../../sepet?durum=no");
	}
   }	
}
if(isset($_GET["yorumsil"])) {
   if ($_GET['yorumsil']=="ok") {
	
      $sil=$db->prepare("DELETE from yorumlar where yorum_id=:yorum_id");
      $kontrol=$sil->execute(array(
         'yorum_id' => strip_tags(htmlspecialchars($_GET['yorum_id']))
         ));
   
      if ($kontrol) {
   
         
         Header("Location:../production/yorum.php?durum=ok");
   
      } else {
   
         Header("Location:../production/yorum.php?durum=no");
      }
   
   }
}



if ($_GET['yorum_onay']=="ok") {
   
	$duzenle=$db->prepare("UPDATE yorumlar SET	
		yorum_onay=:yorum_onay
		WHERE yorum_id={$_GET['yorum_id']}");
	$update=$duzenle->execute(array(
		'yorum_onay' => strip_tags(htmlspecialchars($_GET['yorum_one']))
		));
	if ($update) {
		Header("Location:../production/yorum.php?durum=ok");
	} else {
		Header("Location:../production/yorum.php?durum=no");
	}

}


if (isset($_POST['bankaekle'])) {
   controll();
	$kaydet=$db->prepare("INSERT INTO banka SET
		banka_ad=:ad,
		banka_durum=:banka_durum,	
		banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_iban=:banka_iban
		");
	$insert=$kaydet->execute(array(
		'ad' => strip_tags(htmlspecialchars($_POST['banka_ad'])),
		'banka_durum' => strip_tags(htmlspecialchars($_POST['banka_durum'])),
		'banka_hesapadsoyad' => strip_tags(htmlspecialchars($_POST['banka_hesapadsoyad'])),
		'banka_iban' => strip_tags(htmlspecialchars($_POST['banka_iban']))		
		));

	if ($insert) {

		Header("Location:../production/banka.php?durum=ok");

	} else {

		Header("Location:../production/banka.php?durum=no");
	}

}


if (isset($_POST['bankaduzenle'])) {
   controll();
	$banka_id=$_POST['banka_id'];

	$kaydet=$db->prepare("UPDATE banka SET

		banka_ad=:ad,
		banka_durum=:banka_durum,	
		banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_iban=:banka_iban
		WHERE banka_id={$_POST['banka_id']}");
	$update=$kaydet->execute(array(
		'ad' => strip_tags(htmlspecialchars($_POST['banka_ad'])),
		'banka_durum' => strip_tags(htmlspecialchars($_POST['banka_durum'])),
		'banka_hesapadsoyad' => strip_tags(htmlspecialchars($_POST['banka_hesapadsoyad'])),
		'banka_iban' => strip_tags(htmlspecialchars($_POST['banka_iban']))		
		));

	if ($update) {

		Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=ok");

	} else {

		Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=no");
	}


	

}


if ($_GET['bankasil']=="ok") {
   controll();
	$sil=$db->prepare("DELETE from banka where banka_id=:banka_id");
	$kontrol=$sil->execute(array(
		'banka_id' => strip_tags(htmlspecialchars($_GET['banka_id']))
		));

	if ($kontrol) {

		
		header("Location:../production/banka.php?durum=ok");

	} else {

		header("Location:../production/banka.php?durum=no");
	}

}


if(isset($_POST["bankasipariskaydet"])) {
   controll();
	$siparis_toplam = strip_tags(htmlspecialchars($_POST["siparis_toplam"]));
 

   $siparis_tip = "Bank Köçürməsi";
   $kullanici_id = $user_id;
   $siparis_banka = strip_tags(htmlspecialchars($_POST["banka_ad"]));
   $siparisEkle = $db->prepare("INSERT INTO siparis (siparis_toplam, siparis_tip, kullanici_id, siparis_banka) VALUES(?, ?, ?, ?)");
   $insert = $siparisEkle->execute([$siparis_toplam, $siparis_tip, $kullanici_id, $siparis_banka]);
  
   $eklenenSiparisSayi = $siparisEkle->rowCount();
   if($eklenenSiparisSayi > 0) {
      $id = $db->lastInsertId();
   
      $urunler = explode(" ", strip_tags(htmlspecialchars($_POST["urun_ids"])));
      $lastindex = count($urunler);
      for($i=0; $i < $lastindex-1; $i++) {
         $urunleriSorgula = $db->prepare("SELECT * FROM urunler WHERE urun_id = ?");
         $urunleriSorgula->execute([$urunler[$i]]);
         $urun = $urunleriSorgula->fetch(PDO::FETCH_ASSOC);
         $urun_fiyat = $urun["urun_fiyat"];
         $sepetiSorgula = $db->prepare("SELECT * FROM sepet WHERE urun_id = ? AND kullanici_id = ?");
         $sepetiSorgula->execute([$urunler[$i], $user_id]);
         $sepet = $sepetiSorgula->fetch(PDO::FETCH_ASSOC);
         $urun_adet = $sepet["urun_adet"];
      
         $kayd = $kaydet = $db->prepare("INSERT INTO siparis_detay(siparis_id, urun_fiyat, urun_adet, urun_id) VALUES($id, $urun_fiyat, $urun_adet, $urunler[$i])");
         $kaydet->execute();
         $urunleriSatisi = $db->prepare("UPDATE urunler SET satis_sayi = satis_sayi+? WHERE urun_id = ?");
         $urunleriSatisi->execute([$urun_adet, $urunler[$i]]);
         $urunleriAzalt = $db->prepare("UPDATE urunler SET urun_stok = urun_stok-? WHERE urun_id = ?");
         $urunleriAzalt->execute([$urun_adet, $urunler[$i]]);
      }
   
      if($kayd) {
         $sepetiBosalt = $db->prepare("DELETE FROM sepet WHERE kullanici_id = $user_id");
         $sepetiBosalt->execute();
         $silinme = $sepetiBosalt->rowCount();
       
         header("Location:../../siparis.php?durum=ok");
      } else {
         header("Location:../../siparis.php?durum=no");
      }
   } else {
      echo "ugursuz";
   }
}




if ($_GET['siparissil']=="ok") {
   controll();
	$sil=$db->prepare("DELETE from siparis where siparis_id=:siparis_id");
	$kontrol=$sil->execute(array(
		'siparis_id' => strip_tags(htmlspecialchars($_GET['siparisid']))
		));

	if ($kontrol) {

		
		header("Location:../production/siparisler.php?durum=ok");

	} else {

		header("Location:../production/siparisler.php?durum=no");
	}

}



if ($_GET['sepetsil']=="ok") {
   controll();
	$sil=$db->prepare("DELETE from sepet where sepet_id = ?");
	$kontrol=$sil->execute([$_GET['sepetid']]);
   $user_id = strip_tags(htmlspecialchars($_GET["user_id"]));
	if ($kontrol) {
		header("Location:../production/sepetone.php?user_id=$user_id&durum=ok");
	} else {
		header("Location:../production/sepetone.php?user_id=$user_id&durum=no");
	}

}








if (isset($_POST["setimgorder"])) {
   controll();
   $resimid = strip_tags(htmlspecialchars($_POST["resimid"]));
   $sira = strip_tags(htmlspecialchars($_POST["urunfoto_sira"]));
   $resimguncelle = $db->prepare("UPDATE urunfoto SET urunfoto_sira = ? WHERE urunfoto_id = ?");
   $update = $resimguncelle->execute([$sira, $resimid]);
   if ($update) {
		header("Location:../production/resim-guncelle.php?resimid=$resimid&durum=ok");
	} else {
		header("Location:../production/resim-guncelle.php?resimid=$resimid&durum=no");
	}

}


if (isset($_POST['resimduzenle'])) {
   controll();
   $resimid = $_GET["resimid"];
   $yesFormat = ["png", "jpg", "jpeg"];
   $format = explode("/", $_FILES['urunresmi']["type"])[1];
   


     if(in_array($format, $yesFormat)){
         echo $format;
     } else {
      header("Location:../production/resim-guncelle.php?resimid=$resimid&status=wrongfromat");
      exit();
     }


   if($_FILES['urunresmi']["size"] > 1048576) {
      header("Location:../production/resim-guncelle.php?resimid=$resimid&status=bigsize");
      exit();
   }

   $uploads_dir = '../../dimg';

   @$tmp_name = $_FILES['urunresmi']["tmp_name"];
   @$name = $_FILES['urunresmi']["name"];

   $benzersizsayi4=rand(20000,32000);
   $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

   @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

   
   $duzenle=$db->prepare("UPDATE urunfoto SET
      urun_fotoresimyol=:logo
      WHERE urunfoto_id=:id");
   $update=$duzenle->execute(array(
      'logo' => $refimgyol,
      'id' => $resimid
      ));



   if ($update) {

      $resimsilunlink=$_POST['eski_yol'];
      unlink("../../$resimsilunlink");
      header("Location:../production/resim-guncelle.php?resimid=$resimid&status=ok");

   } else {

      header("Location:../production/resim-guncelle.php?resimid=$resimid&status=ok");
   }

}



if ($_GET['urunresimsil']=="ok") {
   controll();
	$sil=$db->prepare("DELETE from urunfoto where urunfoto_id = ?");
	$kontrol=$sil->execute([$_GET['resimid']]);
   $resimid = $_GET["resimid"];
	if ($kontrol) {
		header("Location:../production/urun-galeri.php");
	} else {
		header("Location:../production/urun-galeri.php");
	}
}



if(isset($_POST["newsSign"])) {
   if(isset($_POST["newsRegisterEmail"])) {
      $email = $_POST["newsRegisterEmail"];
   } else {
      $email = "";
   }
   if($email == "") {
      header("Location: ../../index.php?addedStatus=empty");
      exit();
   }
   $newsFetch = $db->prepare("SELECT * FROM newsregister WHERE email = ?");
   $newsFetch->execute([$email]);
   $emailCount = $newsFetch->rowCount();
   if($emailCount > 0) {
      header("Location: ../../index.php?addedStatus=yes");
      exit();
   } else {
      $fethcForInsert = $db->prepare("INSERT INTO newsregister(email) VALUES(?)");
      $fethcForInsert->execute([$email]);
      $addedEmail = $fethcForInsert->rowCount();
      if($addedEmail>0) {
         header("Location: ../../index.php?addedStatus=ok");
         exit();
      } else {
         header("Location: ../../index.php?addedStatus=no");
         exit();
      }
   }
}


if ($_GET['mesdeyis']=="ok") {
   controll();
   echo $_GET['mess_id'];

	$sil=$db->prepare("UPDATE newsregister SET durum = ? WHERE id  = ?");
	$kontrol=$sil->execute(["1", $_GET['mess_id']]);
	if ($kontrol) {
		header("Location:../production/alerts.php?durum=ok");
	} else {
		header("Location:../production/alerts.php?durum=no");
	}
}
if ($_GET['mesdeyis']=="no") {
   controll();
	$sil=$db->prepare("UPDATE newsregister SET durum = ? WHERE id  = ?");
	$kontrol=$sil->execute(["0", $_GET['mess_id']]);
	if ($kontrol) {
		header("Location:../production/alerts.php?durum=ok");
	} else {
		header("Location:../production/alerts.php?durum=no");
	}
}

if ($_GET['messil']=="ok") {
   controll();
	$sil=$db->prepare("DELETE from newsregister where id = ?");
	$kontrol=$sil->execute([$_GET['mess_id']]);
   $resimid = $_GET["resimid"];
	if ($kontrol) {
      header("Location:../production/alerts.php?durum=ok");
	} else {
      header("Location:../production/alerts.php?durum=no");
	}
}
?>