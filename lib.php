<?php
	include 'dbconnect.php';

	function fetchRooms($adults)
	{
		$room_ids = [];
		$query = "select * from rooms";
		$sql = mysql_query($query) or die("fetching rooms error query!");
		while($result = mysql_fetch_assoc($sql))
		{
			if($result['number_persons'] >= $adults)
			{
				array_push($room_ids,$result['id']);
			}
		}
		return $room_ids;
	}

	function fetchRoomDetails($start, $end, $adults, $children)
	{
		$query = "select * from `room_booking` where `room_booking`.`date` >= '$start' and `room_booking`.`date` <= '$end'";
		$sql = mysql_query($query) or die("error");
		$room_ids = fetchRooms($adults);
		while($result = mysql_fetch_assoc($sql))
		{
			if( (($key = array_search($result['room_id'], $room_ids)) !== false) )
			{
				unset($room_ids[$key]);
			}
		}
		return $room_ids;
	}

	function getRoom($id)
	{
		$query = "select * from rooms where `id` = $id";
		$sql = mysql_query($query);
		return $sql;
	}

	function getInterval($start,$end)
	{
		$date1 = new DateTime($end);
		$date2 = new DateTime($start);
		$interval = $date1->diff($date2);
		return $interval;
	}

	function calcBedCharge($adults,$name)
	{
		$bed_charge = 0;
		if($name == "Family Room")
		{
			if($adults == 7)
			{
				$bed_charge = 300;
			}
			if($adults == 8)
			{
				$bed_charge = 600;
			}
		}
		else{
			if($adults == 3)
			{
				$bed_charge = 300;
			}
		}
		return $bed_charge;
	}

	function generateNewTransaction($name,$address,$phone,$email,$checkin,$checkout,$room_name,$amount,$adults,$children,$id)
	{
		$sql = "INSERT INTO `booking_history` (`id`, `name`, `address`, `phone`, `email`, `check in`, `check out`, `room_type`, `amount`, `adults`, `children`, `status`,`room_id`) VALUES (NULL, '$name', '$address', '$phone', '$email', '$checkin', '$checkout', '$room_name', '$amount', '$adults', '$children', 'pending','$id')";
		$query = mysql_query($sql);
		$id = mysql_insert_id();
		$id = "Sdr".$id;
		return $id;
	}

	function getHistory($id)
	{
		$sql = "select * from booking_history where id = '$id'";
		$query = mysql_query($sql);
		return $query;
	}

	function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {

    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while( $current <= $last ) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
	}

	function updateBookingStatus($id)
	{
		$id = explode("Sdr", $id);
		$id = $id[1];	
		$sql = "UPDATE `booking_history` SET `status` = 'success' WHERE `booking_history`.`id` = '$id'";
		mysql_query($sql);
		$history = getHistory($id);
		$history_details = mysql_fetch_assoc($history);
		$end = $history_details['check out'];
		$start = $history_details['check in'];
		$room_id = $history_details['room_id'];
		$room_name = $history_details['room_type'];
		$dates = date_range($start,$end);
		for($i=0;$i<count($dates);$i++)
		{
			$date = $dates[$i];
			$sql = "INSERT INTO `room_booking` (`id`, `room_name`, `room_id`, `date`) VALUES (NULL, '$room_name', '$room_id', '$date')";
			mysql_query($sql);
		}
	}

	function fetchBookings()
	{
		$sql = "SELECT * FROM `booking_history` order by `id` desc";
		$query = mysql_query($sql) or die("error in fetching bookings query");
		return $query;
	}

	function calcTotalFare($days,$adults,$id)
	{
		$room = getRoom($id);
		$room_details = mysql_fetch_assoc($room);
		$rate = $room_details['cost'];
		$bed_charge = calcBedCharge($adults,$room_details['name']);
		$rate = $rate * $days;
		$bed_charge = $bed_charge * $days;
		$vat = (($rate)*12.5)/100;
		$service_charge = (($rate + $bed_charge + $vat)*2.5)/100;
		$total_charge = $rate + $bed_charge + $vat + $service_charge;
		return $total_charge; 
	}

	function getFareDetails($start,$end,$adults,$id)
	{
		$interval = getInterval($end,$start);
		$days = $interval->days;
		return round(calcTotalFare($days,$adults,$id));
	}

?>