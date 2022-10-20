<?php
	require_once("header.php");
  $menusor = $db->prepare("SELECT * FROM menuler WHERE menu_seourl= ?");
  $menusor->execute([$_GET["sef"]]);
  $menucek = $menusor->fetch((PDO::FETCH_ASSOC));
?>

	
	<div class="container">
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title"><?=$menucek["menu_ad"]?></div>
				</div>
				
			
				<div class="page-content">
					<p>
          <?=$menucek["menu_detay"]?>
					</p>
				</div>
				
			</div>
			<?php
				require_once("sidebar.php");
			?>
		</div>
		<div class="spacer"></div>
	</div>
	
	<?php
	require_once("footer.php");
	?>