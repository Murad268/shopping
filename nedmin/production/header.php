<?php
  ob_start();
  session_start();
  require_once("../netting/baglan.php");
  require_once("../netting/functions.php");
  controll();
  $__ADMINSORGUSU = $db->prepare("SELECT * FROM users WHERE user_email = ?");
  $__ADMINSORGUSU->execute([$_SESSION["admin_mail"]]);
  $ADMIN = $__ADMINSORGUSU->fetch(PDO::FETCH_ASSOC);
  $admin_name = $ADMIN["user_name"];
    $SAY = $__ADMINSORGUSU->rowCount();
    if($SAY == 0) {
      header("Location: login.php");
      exit();
    } 
  $_NEWSFETHC = $db->prepare("SELECT * FROM newsregister WHERE durum = 1");
  $_NEWSFETHC->execute();
  $_NEWSFETHCCOUNT = $_NEWSFETHC->rowCount();
  $NEWS = $_NEWSFETHC->fetchAll(PDO::FETCH_ASSOC); 
  $sor = $db->prepare("SELECT * FROM users WHERE user_id = ?");
  $sor->execute([$ADMIN["user_id"]]);
  $soru = $sor->fetch(PDO::FETCH_ASSOC);
  $sorCount = 0;
  $fullPecent = 0;
  foreach($soru as $sor) {
    $sorCount++;
    if($sor == null) {
      $fullPecent++;
    }
  }

  $percent = $fullPecent/$sorCount*100;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$ayar_title?></title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span><?=$ADMIN["user_name"]?></span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img  src="../../dimg/<?=$ADMIN["user_photo"]?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Xoşgəldin,</span>
                <h2><?=$admin_name?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Parametrlər</h3>
                <ul class="nav side-menu">
                <li><a><i class="fa fa-cogs"></i>Parametrlər <span class="fa fa-cogs"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="generalP.php">Ümumi Parametrlər</a></li>
                      <li><a href="contactP.php">Əlaqə Parametrləri</a></li>
                      <li><a href="apiP.php">Api Parametrləri</a></li>
                      <li><a href="mailP.php">Mail Parametrləri</a></li>
                      <li><a href="socialP.php">Sosial Şəbəkə Parametrləri</a></li>
                    </ul>
                </li>
                <li><a href="index.php"><i class="fa fa-home"></i>Ana Səhifə</a></li>
                <li><a href="about.php"><i class="fa fa-info"></i>Haqqımızda</a></li>
                <li><a href="users.php"><i class="fa fa-user"></i>İstifadəçilər</a></li>
                <li><a href="urun.php"><i class="fa fa-shopping-basket"></i>Məhsullar</a></li>
                <li><a href="menuler.php"><i class="fa fa-list"></i>Menyular</a></li>
                <li><a href="kategori.php"><i class="fa fa-list-alt"></i>Kateqoriyalar</a></li>
                <li><a href="slider.php"><i class="fa fa-image"></i>Slider</a></li>
                <li><a href="yorum.php"><i class="fa fa-comment"></i>Şərhlər</a></li>
                <li><a href="banka.php"><i class="fa fa-bank"></i>Bank Hesabları</a></li>
                <li><a href="siparisler.php"><i class="fa fa-shopping-cart"></i>Sifarişlər</a></li>
                <li><a href="sepet.php"><i class="fa fa-archive"></i>İstifadəçi səbətləri</a></li>
                <li><a href="urun-galeri.php"><i class="fa fa-image"></i>Məhsul rəsmləri</a></li>
                <li><a href="exit.php"><i class="fa fa-sign-out"></i>Çıxış</a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <div class="top_nav">
             <div class="nav_menu">
               <nav>
                 <div class="nav toggle">
                   <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                 </div>
   
                 <ul class="nav navbar-nav navbar-right">
                   <li class="">
                     <a href="./user-update.php?userid=<?=$ADMIN["user_id"]?>" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                       <img src="../../dimg/<?=$ADMIN["user_photo"]?>" alt=""><?=$admin_name?>
                       <span class=" fa fa-angle-down"></span>
                     </a>
                     <ul class="dropdown-menu dropdown-usermenu pull-right">
                       <li><a href="javascript:;">Profil</a></li>
                       <li>
                         <a href="./user-update.php?userid=<?=$ADMIN["user_id"]?>">
                          <?php
                         
                          ?>
                           <span class="badge bg-red pull-right"><?=$percent?>%</span>
                           <span>Hesab Parametrləri</span>
                         </a>
                       </li>
                       
                       <li><a href="exit.php"><i class="fa fa-sign-out pull-right"></i>Çıxış</a></li>
                     </ul>
                   </li>
   
                   <li role="presentation" class="dropdown">
                     <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                       <i class="fa fa-envelope-o"></i>
                       <span class="badge bg-green"><?=$_NEWSFETHCCOUNT>0?$_NEWSFETHCCOUNT:null?></span>
                     </a>
                     <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                       <li>
                        <?php
                          if($_NEWSFETHCCOUNT>0) {
                            foreach($NEWS as $oneNews) {
                              // echo date_default_timezone_get();
                              $date = new DateTime($oneNews["date"]);
                              $date = $date->sub(new DateInterval('PT1H'));
                              $now = new DateTime();
                              $year = $date->diff($now)->format("%y");
                              $day = $date->diff($now)->format("%d");
                              $hours = $date->diff($now)->format("%h");
                              $minuts = $date->diff($now)->format("%i");
                              $seconds = $date->diff($now)->format("%s");
                    
             
                              if($year>0) {
                                $ago = $year;
                                $type = "il";
                              } elseif($day>0) {
                                $ago = $day;
                                $type = "gün";
                              } elseif($hours>0) {
                                $ago = $hours;
                                $type = "saat";
                              } elseif($minuts>0) {
                                $ago = $minuts;
                                $type = "dəqiqə";
                              } elseif($seconds>0) {
                                $ago = $seconds;
                                $type = "saniyə";
                              }


                            
                              ?>
                                <a>
                                  <span>
                                    <span><?=$oneNews["email"]?></span>
                                    <span class="time"><?=$ago."  ".$type?> əvvəl</span>
                                  </span>
                                </a>
                            <?php
                            }
                          }  
                        ?>
                       </li>
                       <li>
                         <div class="text-center">
                           <a href="alerts">
                             <strong>Bütün qeydiyyatlara bax</strong>
                             <i class="fa fa-angle-right"></i>
                           </a>
                         </div>
                       </li>
                     </ul>
                   </li>
                 </ul>
               </nav>
             </div>
           </div>