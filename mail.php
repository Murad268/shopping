<?php
require_once("./nedmin/netting/baglan.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "PHPMailer/src/Exception.php";
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST["adsoyad"])){
	$adsoyad		=	$_POST["adsoyad"];
}else{
	$adsoyad		=	"";
}

if(isset($_POST["email"])){
	$email		=	$_POST["email"];
}else{
	$email		=	"";
}

if(isset($_POST["mesaj"])){
	$mesaj	=	$_POST["mesaj"];
}else{
	$mesaj	=	"";
}

if ($_POST['toplam']!=$_POST['islem']) {
	
	echo "bot kontrolu.Əməliyyatın nəticəsi düzgün daxil edilməmişdir.";
	exit;
}
if(($adsoyad!="") and ($email!="") and ($mesaj!="") ){
	$MailIcerigiHazirla		=	"Ad soyad : " . $adsoyad . "<br />E-Mail Adresi : " . $email . "<br />Mesaj : " . $mesaj . " " ;
	
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
		$MailGonder->setFrom($email, $adsoyad);
		$MailGonder->addAddress($ayar_mail, $ayar_title);
		$MailGonder->addReplyTo($ayar_mail, $ayar_title);
		$MailGonder->isHTML(true);
		$MailGonder->Subject = $ayar_title . ' Əlaqə Formu Mesajı';
		$MailGonder->MsgHTML($MailIcerigiHazirla);
		$MailGonder->send();
		
		header("Location: mailtamam");
		exit();
	}catch(Exception $e){
		echo $e->getMessage();
		// header("Location: mailhata");
		exit();
	}
}else{
	header("Location: maileksik");
	exit();
}
?>