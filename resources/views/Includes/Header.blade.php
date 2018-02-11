@include('Includes.ValidateSession')
<!DOCTYPE html>
<html>
<head>
	<!-- Scripts -->
	<script type="text/javascript" src="<?php echo URL::to('/js/jquery-3.2.1.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo URL::to('/js/alertify.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo URL::to('/js/Navigation.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo URL::to('/js/bootstrap.min.js'); ?>"></script>	

	<!--Data Tables JS-->
	<script type="text/javascript" src="<?php echo URL::to('/DataTable/media/js/jquery.dataTables.min.js');?>"></script>
	<script type="text/javascript" src="<?php echo URL::to('/DataTable/media/js/dataTables.bootstrap.js');?>"></script>

	<!--Data Tables CSS-->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/DataTable/media/css/dataTables.bootstrap.css');?>">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/css/style.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/css/alertify.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo URL::to('/font-awesome/css/font-awesome.min.css'); ?>">
</head>

@include('Includes.Sidebar')
@include('Includes.Galeria')