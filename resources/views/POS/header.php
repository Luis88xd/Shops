<?php include('/../ValidateSession.php'); ?>
<?php include('/../Sidebar.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>POS</title>
	<!-- Scripts -->
	<script type="text/javascript" src="<?php echo URL::to('/js/jquery-3.2.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo URL::to('/js/alertify.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo URL::to('/js/Home.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo URL::to('/js/charts.js'); ?>"></script>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/css/alertify.css') ?>">
</head>
<body>

<?php include("menu.php"); ?>