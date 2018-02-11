<?php

if( isset($_POST) ){ // secure script, works only if POST was made

	/*
	* Connect to Your databes
	*/
	include( 'db_connection.php' );

	$array_items = $_POST['item']; //array of items in the Unordered List
	$order = 0; //order number set to 0; 

	
	

	// IF CONNECTED run foreach loop
	if($connect_to_db){

	    foreach ( $array_items as $item) {

	    	$update = "UPDATE $db_table SET ord = '$order' WHERE id='$item' "; // MYSQL query that: Update in db_table Order with value $order where rows id equals $item. $item is the number in index.php file: item-3.
			$perform = mysql_query( $update ); //perform the update

		    $order++; //increment order value by one;
		    echo mysql_error();
		}

	} else {
		echo 'Connection error';
	}
	
	mysql_close($connect_to_db); //close database connection

}


