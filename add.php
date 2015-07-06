<html>
<head>
<title>Covers Portal</title>

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
	<div class="container"> 
		<div class="col-md-12">
			<div class="bs-callout bs-callout-info" id="callout-helper-bg-specificity" id="header">
			    <h4 id="dealing-with-specificity"><b>ახალი წიგნის ატვირთვის ფორმა</b><a class="anchorjs-link" href="#dealing-with-specificity"><span class="anchorjs-icon"></span></a></h4>
			    <p>
			    	გთხოვთ სწორად შეავსოთ ყველა ველი და დააჭიროთ ღილაკს "დადასტურება".
			    </p>
			</div>
		</div>
		<div class="col-md-12">
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="form-group">
				    <label for="exampleInputEmail1">ISBN</label>
				    <input type="text" class="form-control" id="exampleInputEmail1"  name="isbn">
				 </div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Name</label>
				    <input type="text" class="form-control" id="exampleInputEmail1"  name="title">
				 </div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Description</label>
				    <textarea class="form-control" rows="3" name="description"></textarea>
				 </div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Image</label>
				    <input type="file" class="form-control" id="exampleInputEmail1" name="image">
				 </div>		
				<div class="form-group">
					<input type="submit" value="დადასტურება" name="submit" class="btn btn-default">
				 </div>		
			</form>
		</div>
	</div>
</body>
</html>

<?php

	if(isset($_POST["submit"])) {
		$isbn 	= $_POST["isbn"];
		$title 	= $_POST["title"];
		$descr 	= $_POST['description'];
		$img  	= $_FILES['image'];

		
		if(isset($_FILES['image'])){
		    $errors= array();
		    $file_name = $_FILES['image']['name'];
		    $file_size =$_FILES['image']['size'];
		    $file_tmp =$_FILES['image']['tmp_name'];
		    $file_type=$_FILES['image']['type'];   
		    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
		    $extensions = array("jpeg","jpg","png");                   
		    if(empty($errors)==true){
		        move_uploaded_file($file_tmp,"uploads/".$file_name);
		        	$query = "INSERT INTO `book` (`isbn`,`names`,`description`,`image`) VALUES ($isbn,'$title','$descr','$file_name')";
					$run   = mysqli_query($conn,$query);
		        echo "Success";
		        echo  $isbn . " " . $title . " " .$descr . " " .$file_name;
		    }else{
		        print_r($errors);
		    }
		}
	}
?>