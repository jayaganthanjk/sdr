<div class="row contact-page">
	<div class="page">Contact</div>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<address>
			  	<strong>Sri durga Residency,</strong><br>
			  	31/519-A, Pakkoda Point Road,<br>
			  	Yercaud,<br>
			  	Salem-636601.<br>
			  	<abbr title="Phone">Phone:</abbr> 04281-222336
				</address>
			</div>
			<div class="col-md-4">

			</div>
			<div class="col-md-4">
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="contact-googlemap"><iframe width="557" height="347" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=+&amp;q=Yercaud,sri+durga+residency&amp;ie=UTF8&amp;hq=Yercaud,sri+durga+residency&amp;t=m&amp;cid=4751519378746873143&amp;ll=11.787375,78.225231&amp;spn=0.029155,0.047808&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br><small><a href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=+&amp;q=Yercaud,sri+durga+residency&amp;ie=UTF8&amp;hq=Yercaud,sri+durga+residency&amp;t=m&amp;cid=4751519378746873143&amp;ll=11.787375,78.225231&amp;spn=0.029155,0.047808&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left">View Larger Map</a></small></div>
			</div>
			<div class="col-md-4">
				<form action="contact_functions.php" method="post" role="form">
					<legend>Drop us a Message</legend>
					<div class="form-group">
						<input type="text" class="form-control" name="name" placeholder="Name" required/>
					</div>
					<div class="form-group">
						<input type="email" class="form-control" name="email" placeholder="Email" required/>
					</div>
					<div class="form-group">
						<input type="text" class="form-control" name="subject" placeholder="Subject" required/>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="message" placeholder="Message" required></textarea>
					</div>
					<input type="submit" class="form-control btn btn-primary" value="Send" />
				</form>
			</div>
		</div>
		<?php 
			if(isset($_GET['success']))
			{
				?>
				<div class="alert alert-dismissable alert-success">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  <strong>Well done!</strong> <?php echo @$_GET['success']; ?>
				</div>
		<?php
			}
		?>
	</div>
</div>