<?php
require_once 'functions.php';
$url = $_GET['route'];
$urlSegments = explode('/', $url);
$mas = getArticle($urlSegments);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	 <link rel="shortcut icon" href="<?php echo BASEURL;?>img/icons/favicon.png" type="image/png">
	<title></title>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="<?php echo BASEURL;?>css/materialize.css"  media="screen,projection"/>
	<link type="text/css" rel="stylesheet" href="<?php echo BASEURL;?>css/basestyle.css"  media="screen,projection"/>
</head>
<body>
<div id="main_wrapper">


	
	
</div>	
	<script type="text/javascript" src="<?php echo BASEURL;?>js/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="<?php echo BASEURL;?>js/materialize.js"></script>
	<script type="text/javascript" src="<?php echo BASEURL;?>js/swiper.jquery.js"></script>
	<script type="text/javascript" src="<?php echo BASEURL;?>js/functions.js"></script>	
</body>
</html>