<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	<title><?=$config->get('config.systeminfo.title')?></title>
	<?php



		$themes->lib->add('main');
		if (ISAPP){
			$themes->lib->add('app');
			echo '<script>window.isapp=true;</script>';
		}else{
			echo '<script>window.isapp=false;</script>';
		}



		echo $themes->lib->out();
	?>

</head>
<body>
