<form id="msform" action="pay.php" method="post">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Summary</li>
		<li>Payment Mode</li>
		<li>Personal Details</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Booking Summary</h2>
		<hr/>
		<div class="row">
					<div class="col-xs-8">
						Check in 
					</div>

					<div class="col-xs-4">
						<?php echo $start; ?>
					</div>
		</div>


				<div class="row">
					<div class="col-xs-8">
						Check out
					</div>

					<div class="col-xs-4">
						<?php echo $end; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						No of nights
					</div>

					<div class="col-xs-4">
						<?php echo $interval->days; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						No of adults
					</div>

					<div class="col-xs-4">
						<?php echo $_GET['adults']; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						No of children
					</div>

					<div class="col-xs-4">
						<?php echo $_GET['children']; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						Room type
					</div>

					<div class="col-xs-4">
						<?php echo $room_details['name']; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						Base rate(per night charges)
						<?php
							if($room_details['name'] == "Family Room")
							{
								echo "(6 adults)";	
							}
							else{
								echo "(2 adults)";
							}
						?>
					</div>

					<div class="col-xs-4">
						<?php 
							$rate = $room_details['cost'];
							echo $rate;
						 ?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						Extra bed charges	
					</div>

					<div class="col-xs-4">
						<?php 
							$bed_charge = 0;
							if($room_details['name'] == "Family Room")
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
							echo $bed_charge;
						?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						Total extra bed charges
					</div>
					<div class="col-xs-4">
						<?php
							$bed_charge = $bed_charge * $interval->days;
							echo round($bed_charge);
						?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						Total room rent for (<?php echo $interval->days; ?> days)
					</div>
					<div class="col-xs-4">
						<?php
							$rate = $rate * $interval->days;
							echo round($rate);
						?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						VAT(12.5%)
					</div>

					<div class="col-xs-4">
						<?php
							$vat = (($rate)*12.5)/100;
							echo round($vat);
						?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						Service charges(2.5%)
					</div>

					<div class="col-xs-4">
						<?php
							$service_charge = (($rate + $bed_charge + $vat)*2.5)/100;
							echo round($service_charge);
						?>
					</div>
				</div>

				<div class="row">
					<div class="col-xs-8">
						Total
					</div>
					<div class="col-xs-4">
						<?php
							$total_charge = $rate + $bed_charge + $vat + $service_charge;
							echo round($total_charge);
						?>
					</div>
				</div>

		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Payment Mode</h2>
		<hr />
		<div class="row">
			<label class="radio-inline" >
				<input type="radio" style="margin-top:8px;" checked/> Pay u money			
			</label>
		</div>
		<div class="row">
			<label class="radio-inline" >
				<input type="radio" style="margin-top:8px;"/> Paypal			
			</label>
		</div>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Personal Details</h2>
		<hr />
		<div class="row">
			<div class="col-xs-8 col-xs-offset-2">
				<input type="text" name="firstname" placeholder="First Name" required/>
				<input type="text" name="lastname" placeholder="Last Name" required/>
				<input type="email" name="email" placeholder="Email" required/>
				<input type="text" name="phone" placeholder="Phone" pattern="[789][0-9]{9}" required/>
				<input type="hidden" name="service_provider" value="payu_paisa" />
				<input type="hidden" name="start" value=<?php echo $start; ?> />
				<input type="hidden" name="end" value=<?php echo $end; ?> />
				<input type="hidden" name="adults" value=<?php echo $adults;?> />
				<input type="hidden" name="id" value=<?php echo $id;?> />
				<input type="hidden" name="surl" value="http://localhost/SDR/success.php"/>	
				<input type="hidden" name="furl" value="http://localhost/SDR/failure.php"/>	
				<input type="hidden" name="productinfo" value=<?php echo $room_details['name']; ?> >
				<textarea name="address1" placeholder="Address"></textarea>
			</div>
		</div>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="submit" name="submit" class="submit action-button" value="Submit" />
	</fieldset>
</form>