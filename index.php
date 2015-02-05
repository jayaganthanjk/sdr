<html>
	<head>
		<title/>Sri Durga Residency</title>
		<?php include 'file_include.php'; ?>
	</head>
	<body >
		<?php include 'header.php'; ?>
		<div id="home">
			<div>
				<div class="row">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					  <!-- Indicators -->
					  <ol class="carousel-indicators">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					  </ol>

					  <!-- Wrapper for slides -->
					  <div class="carousel-inner" role="listbox">
					    <div class="item active">
					      <img src="img/back-4.jpg">
					      <div class="carousel-caption">
					        <div class="text-info">DELUXE</div>
					      </div>
					    </div>
					    <div class="item">
					      <img src="img/back-5-edited.jpg" alt="...">
					      <div class="carousel-caption">
					        <div class="text-info">PREMIUM</div>
					      </div>
					    </div>
					    <div class="item">
					      <img src="img/back-7-edited.jpg" alt="...">
					      <div class="carousel-caption">
					        <div class="text-info">STANDARD</div>
					      </div>
					    </div>
					  </div>

					  <!-- Controls -->
					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
				</div>
			</div>
		</div>
		<div id="about" class="row container-fluid">
			<?php include 'about.php'; ?>
		</div>
		<div id="facilities" class="facilities-back">
			<?php include 'facilities.php' ?>
		</div>
		<div id="tariffs">
			<?php include 'tariffs.php' ?>
		</div>
		<div id="rest" class="rest-back">
			<div class="page">Restuarent</div>
			<?php include 'rest.php'; ?>
		</div>
		<div id="review">
			<?php include 'review.php' ?>
		</div>
		<div id="contact">
			<?php include 'contact.php' ?>
		</div>
		<?php include 'footer.php'; ?>
	</body>
</html>