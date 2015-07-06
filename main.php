<html>
<head>
<title>Covers portal</title>

<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="jquery.easing.min.js" type="text/javascript"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="styles.css" />
<?php include 'db.php';?>
</head>
<body>
<?php include 'nav.php';?>
<?php
		$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
    	$person  = parse_url($url, PHP_URL_QUERY);
    	//echo $person;
    	$id = substr($person, 0,1);

    	$query2 = "SELECT * FROM users";
    	$run2   = mysqli_query($conn,$query2);
    	while($row2 = mysqli_fetch_array($run2)){
    		$userid = $row2[0];
    		$usrnm  = $row2[3];
    		$usrps  = $row2[4]; 
    	}
    	if($person === $userid.$usrnm.$usrps){
    		$query3 = "SELECT * FROM users where id = '$id' ";
    		$run3   = mysqli_query($conn,$query3);

    		while($row3 = mysqli_fetch_array($run3)){
    			$useer = $row3[3];
    			echo '<div class="container"><div class="col-md-12"><div class="panel panel-default"><div class="panel-body">';
    				echo '<div class="col-md-6" id="menu">';
    					echo  '<h4>'.'მოგესალმებით,  '.$useer.'!'.'</h4>';
    				echo '</div>';
    				echo '<div class="col-md-6" id="menu">';
    					echo '<h4>'.'<a href="Covers.php">Covers</a>'.'</h4>';
    				echo '</div>';
    				echo '<div class="col-md-6" id="menu">';
    					echo '<h4>'.'<a href="Covers.php">My Drive</a>'.'</h4>';
    				echo '</div>';
    				echo '<div class="col-md-6" id="menu">';
    					echo '<h4>'.'<a href="Covers.php">Resources</a>'.'</h4>';
    				echo '</div>';
    				echo '<div class="col-md-6" id="header_right">';
    					echo '<h4>'.'<a href="index.php">სისტემიდან გამოსვლა</a>'.'</h4>';
    				echo '</div>';
    			echo '</div>'.'</div>'.'</div>'.'</div>';
    		
    		}
    	}else{
    		header('Location:index.php');
    	}

?>
<div class="container" id="main">
	<div class="col-md-12">
		<div class="bs-callout bs-callout-info" id="callout-helper-bg-specificity" id="header">
			<h4 id="dealing-with-specificity"><b>ძებნა ISBN-ის მიხედვით:</b><a class="anchorjs-link" href="#dealing-with-specificity"><span class="anchorjs-icon"></span></a></h4>
			<p id="title_search">
			   	გთხოვთ შეიყვანოთ ISBN-ი და დააჭიროთ ღილაკს "ძებნა".
			</p>
		</div>
	</div>
	<div class="col-md-12">
		<form action="" method="POST">
		<div class="form-group">
			<label for="exampleInputEmail1" id="title_search">ძებნა:</label>
			<input type="text" class="form-control" id="search"  name="isbn" placeholder="Ex: 9780521223751">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" id="submit" name="submit" value="ძებნა">
		</div>
	</div>
	<div class="col-md-12">
		<?php if(isset($_POST['submit'])){
			$isbn_entry = $_POST['isbn'];

			$query = "SELECT * FROM book WHERE isbn = '$isbn_entry'";
			$run   = mysqli_query($conn,$query);

			while($row = mysqli_fetch_array($run)){
				$isbn  = $row['isbn'];
				$name  = $row['names'];
				$desc  = $row['description'];
				$img   = $row['image'];
				$image = '<img src="uploads/'.$img.'" id="img">';
				$price = $row['price'];
				$points= $row['points'];
				$author= $row['author'];
				$publisher = $row['publisher'];
				//echo $isbn . ' ' . $name . ' ' . $desc . ' ' . $image;
				echo '<div class="col-md-12">';
					echo '<div class="col-md-6">';
						echo $image;
					echo '</div>';
					echo '<div class="col-md-6">';
				echo '<div class="col-md-12">';
						echo '<h6 id="result_font">'.'TITLE:'. " " . $name . '</h6>';
					echo '</div>';
				echo '<div class="col-md-12">';
						echo '<h6 id="result_font">'.'AUTHOR:'. " " . $author . '</h6>';
					echo '</div>';
				echo '<div class="col-md-12">';
					
						echo '<h6 id="result_font">'.'ISBN:'. " " .$isbn . '</h6>';
					echo '</div>';						
				echo '<div class="col-md-12">';
						echo '<h6 id="result_font">'.'PRICE:'. " " . $price . '</h6>';
					echo '</div>';
				echo '<div class="col-md-12">';	
							echo '<h6 id="result_font">DESCRIPTION:</h6>';
								echo '<p id="description_p">'; 
									echo $desc;
					echo '</div>';
						echo '<div class="col-md-12">';
							echo '<h6 id="result_font">'.'POINTS:'. " " . $points . '</h6>';
						echo '</div>';			
								echo '</p>';
						echo '</div>';
					echo '</div>';
				echo '</div>';


			}
		}
		?>
	</div>
</div>

<footer class="site-footer">
 <p class="copyright"> &copy EBG 2015</p>


</footer>

<style type="text/css">


.site-footer {
  height: 55px; 
}
.site-footer {
  background: #5e5e5e;
}
.copyright {
	font-size: 20px;
	float: right;	
	padding: 8px;
	color: white;
}
</style>
</body>
</html>
