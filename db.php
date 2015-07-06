<?php

	$conn = mysqli_connect("localhost","root","","books");

	if($conn){
		//echo "Connected!";
	}else{
		echo "Can't Connected!";
	}

?>