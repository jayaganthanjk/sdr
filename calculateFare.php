<?php
	include 'lib.php';
	$start = $_POST['start'];
	$end =$_POST['end'];
	$adults = $_POST['adults'];
	$id = $_POST['id'];

	echo json_encode(getFareDetails($start,$end,$adults,$id));
?>