<?php
    define( 'HOST', 'localhost' );
	define( 'DB', 'renteasy' );
	define( 'USER', 'root' );
	define( 'PASS', '' );

	$conn = mysqli_connect( HOST, USER, PASS, DB ) 
		or die("Can not connect");

?>