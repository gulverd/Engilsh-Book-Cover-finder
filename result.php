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
    	$isbnn  = parse_url($url, PHP_URL_QUERY);
    	//echo $person;
    	$id = substr($isbnn, 0);
    	//echo $id;
?>
    <div class="container">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-2" id="menuu">
                        <a href="macmillan.php">Macmillan Education</a>
                    </div>
                    <div class="col-md-2" id="menuu">
                        <a href="pearson.php">Pearson Education</a>
                    </div>
                    <div class="col-md-3" id="menuu">
                        <a href="camridge.php">Cambridge University Press</a>
                    </div>
                    <div class="col-md-3" id="menuu">
                        <a href="oxford.php">Oxford University Press</a>
                    </div>
                    <div class="col-md-2" id="menuu">
                        <a href="index.php">სისტემიდან გამოსვლა</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container" id="main">

<div class="col-md-12">
		<?php 

			$query = "SELECT * FROM book WHERE isbn = '$id'";
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
							echo '<div class="col-md-12">';
								echo '<a href="uploads/'.$isbn.'.jpg" download="uploads/'.$img.'"><button type="button" class="btn btn-primary">Download Cover</button></a>';
							echo '</div>';
						echo '</div>';
					echo '</div>';

				echo '</div>';

			}

		?></div>
</div>
</body>
</html>