<html>
<head>
	<title> Reservation | SriDurgaResidency</title>
<?php
	include 'file_include.php';
	//include 'header.php';
	include 'dbconnect.php';
	include 'lib.php';

	function findRooms()
	{	
		$rooms_list = [];
		if(isset($_GET['start']))
		{
			$rooms_list = fetchRoomDetails($_GET['start'],$_GET['end'],$_GET['adults'],$_GET['children']);
		}
		else
		{
			$query = "select * from rooms";
			$rooms_list = mysql_query($query) or die("fetching room details error!");
		}
		return $rooms_list;
	}
?>
</head>
<body>
	<div class="container-fluid" style="background:white;">
		<div class="col-md-4">
			<div class="availability-form">
			<h4>Check Availability</h4>
			<form method="get" action="reservation.php">
				<div class="input-daterange input-group form-group" id="datepicker">
    			<input type="text" class="input-sm form-control" id="check-in-date" name="start" placeholder="Check In" required/>
    			<span class="input-group-addon">to</span>
    			<input type="text" class="input-sm form-control" name="end" id="check-out-date" placeholder="Check Out" required/>
				</div>
				<div class="form-group">
					<label>
						Adults (>11):
					</label>
					<select class="form-control" placeholder="Adult(Age > 11)" name="adults">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
					</select>
				</div>
				<div class="form-group">
					<label>
						Children (<11):
					</label>
					<select class="form-control" placeholder="No of children" name="children">
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
					</select>
				</div>
				<input type="submit" value="Find Rooms" class="btn btn-reserve form-control" />
			</form>
			</div>
		</div>
		<div class="col-md-8">
			<?php 
				$rooms_list;
				if(isset($_GET['start']))
				{
				  $room_ids = array_values(findRooms());
				  $query_cond = implode(',', $room_ids);
				  $query_cond = '('.$query_cond.')';
				  $query = "select * from `rooms` where `id` in $query_cond";
				  $rooms_list = mysql_query($query) or die("error");
				}
				else
				{
					$rooms_list = findRooms();
				}
				while($room = mysql_fetch_assoc($rooms_list))
				{
			?>
				<div class="room-panel">
					<div class="row"><h4 class="room-name"><?php echo $room['name']; ?></h4></div>
					<div class="row clearfix">
						<div class="col-md-4" style="height:150px;"><img src="img/suite-reservation.jpg" style="width:100%;height:100%;"></img></div>
						<div class="col-md-4">
							<h6 style="text-transform:capitalize;">
								<ul class="list-unstyled">
									<li class="room-panel-list"><span class="room-panel-list-type"><strong>Occupancy</strong></span><span class="room-panel-list-name"><?php echo $room['persons']; ?></span></li>
									<li class="room-panel-list"><span class="room-panel-list-type"><strong>Bed</strong></span><span class="room-panel-list-name"><?php echo $room['bed']; ?></span></li>
									<li class="room-panel-list"><span class="room-panel-list-name"><?php echo $room['tv']; ?></span></li>
									<li class="room-panel-list"><span class="room-panel-list-name">Bath amenities</span></li>
								</ul>
							</h6>
						</div>
						<div class="col-md-2 col-md-offset-1">
							<div class="form-group">
								<div class="form-control btn btn-lg btn-cost"><span>&#x20B9; <?php echo $room['cost'];?>/-</span></div>
							</div>
							<div class="form-group">
								<?php 
								if(isset($_GET['start']))
								{
								?>
								<div class="form-control btn btn-lg btn-reserve booking-btn" data-id=<?php echo $room['id']; ?>>BOOK NOW</div>
								<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			<?php	
				}
			?>
		</div>
	</div>
	<?php include 'footer.php';?>
</body>
</html>
