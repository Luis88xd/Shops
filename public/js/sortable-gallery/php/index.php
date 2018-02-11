<!-- =============================================== -->
<!-- =                                             = -->
<!-- =                Keyners	                   = -->
<!-- =                                             = -->
<!-- =          http://keyners.pl/	               = -->
<!-- =============================================== -->


<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>Sortable gallery - PHP</title>
	<meta name="description" content="">
	<meta name="author" content="Keyners http://keyners.pl/">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- PT Sans -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,600&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	 <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

	<!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">


	<!-- JS
  ================================================== -->
	<script src="js/jquery.min.js" type="text/javascript"></script>
	<script src="js/jquery.ui.js" type="text/javascript"></script>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->



		


</head>
<body>

	<header>
		<h1>Sortable gallery - Freebie</h1>
	</header>
    


	
	<section>
		<div class="container">

			<button class="save">Save order</button>
			<div id="response"></div>
			
			<ul class="sortable">
				<?php

				/*
				* Connect to Your databes
				*/
				include( 'db_connection.php' );


				$select = "SELECT * FROM $db_table ORDER BY ord ASC"; // select every element in the table in order by order column
				echo mysql_error();
				$perform = mysql_query( $select ); //perform selection query
				echo mysql_error();

				 while( $array = @mysql_fetch_array( $perform ) ){ //download every row into array
                    $id = $array['id'];
                    $photo_name = $array['photo_name'];
                    ?>
                  	
                  		<li id='item-<?php echo $id ?>'><img src="images/photos/<?php echo $photo_name ?>" alt=""></li>

                  	<?php
                  }

				?>

			</ul>

		</div>
	</section>

	
	<div class="holder">
		<a href="http://keyners.pl/freebie/sortable-gallery" class="download" target="_blank">Download</a>
	</div>


	<footer>
		All rights reserved - <a href="http://keyners.pl/" alt='keyners' title='Keyners' target="_blank">Keyners</a>
	</footer>


	<script type="text/javascript">
		var ul_sortable = $('.sortable'); //setup one variable for sortable holder that will be used in few places


		/*
		* jQuery UI Sortable setup
		*/
		ul_sortable.sortable({
			revert: 100,
			placeholder: 'placeholder'
		});
		ul_sortable.disableSelection();



		/*
		* Saving and displaying serialized data
		*/
		var btn_save = $('button.save'), // select save button
			div_response = $('#response'); // response div



		btn_save.on('click', function(e){ // trigger function on save button click
			e.preventDefault(); 

			var sortable_data = ul_sortable.sortable('serialize'); // serialize data from ul#sortable

			div_response.text( 'Saving... please wait' ); //setup response information


			$.ajax({ //aja
	            data: sortable_data,
	            type: 'POST',
	            url: 'save.php', // save.php - file with database update
	            success:function(result) {
		        	div_response.text( 'Saved photo order' );
			    }
	        });
	     
		});

	</script>

</body>
</html>