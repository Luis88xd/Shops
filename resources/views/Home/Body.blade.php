@include('Includes.Header')
@include('Home/Header')

<body>

<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Year', 'Sales', 'Expenses'],
      ['2013',  1000,      400],
      ['2014',  1170,      460],
      ['2015',  660,       1120],
      ['2016',  1030,      540]
    ]);

    var options = {
      title: 'Company Performance',
      hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
      vAxis: {minValue: 0}
    };

    var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
    chart.draw(data, options);
  }
</script>

<div class="content_charts">
  <div id="chart_div" style="width: 100%; height: 500px;"></div>
</div>


<!-- Menu -->
<div class="w90 max1800 margin content_box_menu" style="height: 250px;">
	<div class="w25 float_left content_box relative">
		<div class="box_menu margin" id="item_pos" >
			<!-- style="background-image: url('/img/pos.png'); background-size: cover;" -->
			<div class="center w100"><i class="fa f30 fa-credit-card"></i></div>
			<P>POS</P>	
		</div>
	</div>
	<div class="w25 float_left content_box relative">
		<div class="box_menu margin" id="item_inventario">
			<!-- style="background-image: url('/img/inventory.png'); background-size: cover;" -->
			<div class="center w100"><i class="fa f30 fa-book"></i></div>
			<P>INVENTARIO</P>
		</div>
	</div>
	<div class="w25 float_left content_box relative">
		<div class="box_menu margin" id="item_reportes">
			<!-- style="background-image: url('/img/reports.png'); background-size: cover;" -->
			<div class="center w100"><i class="fa f30 fa-pencil"></i></div>
			<p>REPORTES</p>
		</div>
	</div>
	<div class="w25 float_left content_box relative">
		<div class="box_menu margin" id="item_ajustes" >
			<!-- style="background-image: url('/img/settings.png'); background-size: cover;" -->
			<div class="center w100"><i class="fa f30 fa-cog"></i></div>
			<p>AJUSTES</p>
		</div>
	</div>
</div>

<script>
	function spawnNotification(theBody,theIcon,theTitle) {
		  var options = {
		      body: theBody,
		      icon: theIcon
		  }

		  var n = new Notification(theTitle,options);
		  setTimeout(n.close.bind(n), 4000);
		}
</script>

</body>
</html>