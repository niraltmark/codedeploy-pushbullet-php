<?php
	require 'vendor/autoload.php';
	
	$pb = new Pushbullet\Pushbullet([TOKEN]);
	
	$pb->allDevices()->pushNote("Deployment started", gethostname());
?>