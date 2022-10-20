<div class="main-slide">
   
			<div id="sync1" class="owl-carousel">
            <?php
               $caruselSorgusu = $db->prepare("SELECT * FROM carusel ORDER BY slider_sira");
               $caruselSorgusu->execute();
               $sliders = $caruselSorgusu->fetchAll(PDO::FETCH_ASSOC);
               foreach($sliders as $slider) {?>
               	<div class="item">
                  <div class="slide-desc">
                     <div class="inner">
                        <h1><?=$slider["slider_ad"]?></h1>
                        <p>
                           Nunc non fermentum nunc. Sed ut ante eget leo tempor consequat sit amet eu orci. Donec dignissim dolor eget..
                        </p>
                        <button class="btn btn-default btn-red btn-lg">Add to cart</button>
                     </div>
                     <div class="inner">
                        <div class="pro-pricetag big-deal">
                           <div class="inner">
                                 <span class="oldprice">$314</span>
                                 <span>$199</span>
                                 <span class="ondeal">Best Deal</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="slide-type-1">
                     <img src="<?=$slider["slider_src"]?>" alt="" class="img-responsive">
                  </div>
               </div>
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
                  <p>Description here here here</p>
               </div>
            </div>
         <?php
         }
      ?>
		
		
		</div>