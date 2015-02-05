<?php
	include 'file_include.php';
	include 'lib.php';
	session_start();
?>
<html>
<head>
	<title> Admin | Sri Durga Residency</title>
</head>
<body id="admin-panel">
	<div class="container">
		<?php if(isset($_SESSION['user'])){ ?>
		<div class="row">
			<a href="logout.php"><button class="btn btn-primary pull-right">Logout</button></a>
		</div>
		<div class="row">
			<table class="table table-striped">
				<thead>
					<th>Id</th>
					<th>Name</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Check In</th>
					<th>Check Out</th>
					<th>Room</th>
					<th>Amount</th>
					<th>Adults</th>
					<th>Children</th>
					<th>Payment status</th>
				</thead>
				<tbody>
					<?php $query = fetchBookings(); ?>
					<?php while($result=mysql_fetch_assoc($query)){ ?>
						<tr>
							<td><?php echo $result['id']; ?></td>
							<td><?php echo $result['name']; ?></td>
							<td><?php echo $result['address']; ?></td>
							<td><?php echo $result['phone']; ?></td>
							<td><?php echo $result['email']; ?></td>
							<td><?php echo $result['check in']; ?></td>
							<td><?php echo $result['check out']; ?></td>
							<td><?php echo $result['room_type']; ?></td>
							<td><?php echo $result['amount']; ?></td>
							<td><?php echo $result['adults']; ?></td>
							<td><?php echo $result['children']; ?></td>
							<td><?php echo $result['status']; ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<?php }
		else {
		 ?>
		<div class="row">
			<div class="col-xs-4 col-xs-offset-4">
				<?php
					if(isset($_GET['error']))
					{
				?>
					<div class="alert alert-danger"><?php echo $_GET['error']; ?></div>
				<?php
					}
				?>
				<fieldset>
					<legend><center>Login details</center></legend>
					<form action="login.php" method="post">
						<div class="form-group">
							<label>Username:</label>
							<input class="form-control" type="text" name="username" placeholder="Username" name="username" required></input>
						</div>
						<div class="form-group">
							<label>Password:</label>
							<input class="form-control" type="password" name="password" placeholder="Password" name="password" required></input>
						</div>
						<button class="btn btn-primary">Login</button>
					</form>
				</fieldset>
			</div>
		</div>
		<?php
		}
		?>
	</div>
</body>
</html>