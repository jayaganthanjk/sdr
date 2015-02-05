<?php
use PayPal\Auth;
	$sdkConfig = array(
  "mode" => "sandbox"
);

$cred = new OAuthTokenCredential("AQkquBDf1zctJOWGKWUEtKXm6qVhueUEMvXO_-MCI4DQQ4-LWvkDLIN2fGsd","EL1tVxAjhT7cJimnz5-Nsx9k2reTKSVfErNQF-CmrwJgxRtylkGTKlU4RvrX", $sdkConfig);
?>

<a href="/youraction" data-paypal-button="true">
  <img src="//www.paypalobjects.com/en_US/i/btn/btn_xpressCheckout.gif" alt="Check out with PayPal" />
</a>