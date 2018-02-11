<?php include('Header.php'); ?>
<?php include('/../Sidebar.php'); ?>
<body>

<!-- Menu -->
<div class="w100 margin content_box_menu" style="height: 250px;">
	<div class="w25 float_left">
		<div class="box_menu w90 margin" id="item_pos">
			<P>POS</P>	
		</div>
	</div>
	<div class="w25 float_left">
		<div class="box_menu w90 margin" id="item_inventario">
			<P>INVENTARIO</P>
		</div>
	</div>
	<div class="w25 float_left">
		<div class="box_menu w90 margin" id="item_reportes">
			<p>REPORTES</p>
		</div>
	</div>
	<div class="w25 float_left">
		<div class="box_menu w90 margin" id="item_ajustes">
			<p>AJUSTES</p>
		</div>
	</div>
</div>

<?php //echo "Cache: ".Cache::get('idUsuario'); ?>

<?php include("Chart.php"); ?>

</body>
</html>