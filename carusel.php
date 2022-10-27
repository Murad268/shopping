<div class="main-slide">
   
			<div id="sync1" class="owl-carousel">
            <?php
               $caruselSorgusu = $db->prepare("SELECT * FROM carusel ORDER BY slider_sira");
               $caruselSorgusu->execute();
               $sliders = $caruselSorgusu->fetchAll(PDO::FETCH_ASSOC);
               foreach($sliders as $slider) {
                  $urunlerSorgusu = $db->prepare("SELECT * FROM urunler WHERE urun_id = ?");
                  $urunlerSorgusu->execute([$slider["urun_id"]]);
                  $urun = $urunlerSorgusu->fetch(PDO::FETCH_ASSOC); ?>
               	<a href="urun-<?=seo($urun["urun_ad"])."-".$urun["urun_id"]?>" class="item">
                  <div class="slide-desc">
                     <div class="inner">
                        <h1><?=$slider["slider_ad"]?></h1>
                        <p>
                           <?=$slider["slider_detay"]?>
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Məhsula Get</button>
                     </div>
                     <div class="inner">
                        <div style="width: max-content;" class="pro-pricetag big-deal">
                           <div class="inner">
                                 <span class="oldprice">₼<?=$urun["urun_fiyat"]?></span>
                                 <span>₼<?=round($urun["urun_fiyat"]-($urun["urun_fiyat"]*$urun["discount"]/100), 2)?></span>
                                 <span class="ondeal">Ən yaxşı təklif</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="slide-type-1">
                     <img src="<?=$slider["slider_src"]?>" alt="" class="img-responsive">
                  </div>
               </a>
               <?php
               }
            ?>
			
			
				
			</div>
		</div>
      <div class="bar"></div>
     
		<div id="sync2" class="owl-carousel">
      <?php
         $caruselSorgusu = $db->prepare("SELECT * FROM carusel ORDER BY slider_sira");
         $caruselSorgusu->execute();
         $sliders = $caruselSorgusu->fetchAll(PDO::FETCH_ASSOC);
         foreach($sliders as $slider) {?>
            <div class="item">
               <div class="slide-type-1-sync">
                  <h3><?=$slider["slider_ad"]?></h3>
               </div>
            </div>
         <?php
         }
      ?>
		
		
		</div>