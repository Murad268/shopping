<?php
	require_once("header.php");
?>
<head>
	<title>Haqqımızda</title>
</head>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
							<div class="bigtitle">Haqqımızda</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-9"><!--Main content-->
				<div class="title-bg">
					<div class="title">Promotion Videosu</div>
				</div>
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?=$about_video?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				<div class="title-bg">
					<div class="title">Misyon</div>
				</div>
				<blockquote><?=$about_misyon?></blockquote>
				<div class="title-bg">
					<div class="title">Vizyon</div>
				</div>
				<blockquote><?=$about_vizyon?></blockquote>
				<div class="title-bg">
					<div class="title"><?=$about_title?></div>
				</div>
				<div class="page-content">
					<p>
					<?=$about_desc?>
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