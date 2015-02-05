<html>
<head>
	<title>Prepay | Sri Durga Residency</title>
	<?php include 'file_include.php'; ?>
	<?php 
		include 'lib.php';
		$end = $_GET['end'];
		$start = $_GET['start'];
		$adults = $_GET['adults'];
		$id = $_GET['id'];
		$interval = getInterval($end,$start);
		$room = getRoom($_GET['id']);
		$room_details = mysql_fetch_assoc($room);
	?>	
</head>
<body>
	<div class="row" id="prepay">
		<div class="col-xs-8 col-xs-offset-2">
    <?php include 'stepForm.php'; ?>
    </div>
	</div>
	
</body>
</html>