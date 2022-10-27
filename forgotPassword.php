<?php
   require_once("./nedmin/netting/baglan.php");
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;
   require "PHPMailer/src/Exception.php";
   require 'PHPMailer/src/PHPMailer.php';
   require 'PHPMailer/src/SMTP.php';
   if(isset($_POST["user_email"])) {
      $user_email = $_POST["user_email"];
   } else {
      $user_email = "";
   }


   if($user_email !== "") {
 
      $fetchNull = $db->prepare("SELECT * FROM users WHERE user_email = ? AND user_durum = 1");
      $fetchNull->execute([$user_email]);
      $fetchNullRow = $fetchNull->rowCount();
      $users = $fetchNull->fetch(PDO::FETCH_ASSOC);
      if($fetchNullRow > 0) {
         function password_generate($chars) 
               {
               $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
               return substr(str_shuffle($data), 0, $chars);
               }
             
         $rand = password_generate(6);
         $pass = md5($rand);
         $passwordChange = $db->prepare("UPDATE users SET user_pass=? WHERE user_email = ? AND user_durum = 1");
         $passwordChange->execute([$pass, $user_email]);
         $link = $site_linki."/activation.php?email=".$user_email;
         $MailIcerigiHazirla = "Xoş günlər cənab ".$users["user_name"].  "</br>".
         "saytımıza maraq göstərdiyiniz üçün sizə təşəkkür edirik". "</br>".
         "sizin yeni şifrəniz: $rand"."   Lakin istədiyiniz zaman şifrənizi 'mənim hesabım' bölməsindən yeniləyə bilərsiniz.";

         $MailGonder		=	new PHPMailer(true);
         
         try{
            $MailGonder->SMTPDebug			=	0;
            $MailGonder->isSMTP();
            $MailGonder->Host				=	$ayar_smtphost;
            $MailGonder->SMTPAuth			=	true;
            $MailGonder->CharSet			=	"UTF-8";
            $MailGonder->Username			=	$ayar_mail;
            $MailGonder->Password			=	$ayar_smtppassword;
            $MailGonder->SMTPSecure			=	PHPMailer::ENCRYPTION_SMTPS;
            $MailGonder->Port				=	465;
            $MailGonder->SMTPOptions		=	array(
                                          'ssl' => array(
                                             'verify_peer' => false,
                                             'verify_peer_name' => false,
                                             'allow_self_signed' => true
                                          )
                                       );
            $MailGonder->setFrom($user_email, $adsoyad);
            $MailGonder->addAddress($ayar_mail, $ayar_title);
            $MailGonder->addReplyTo($ayar_mail, $ayar_title);
            $MailGonder->isHTML(true);
            $MailGonder->Subject = $ayar_title . ' Şifrə Sıfırlama Mesajı';
            $MailGonder->MsgHTML($MailIcerigiHazirla);
            $MailGonder->send();
            
            header("Location: register.php?req=ok");
            exit();
         }catch(Exception $e){
            
         }
      } else { 
         header("Location: register.php?req=noacc");
      }
   } else {
      header("Location: register.php?req=noemail");
   }
?>