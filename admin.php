<html>
<head>
<title>Covers Portal</title>

<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="jquery.easing.min.js" type="text/javascript"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
<?php include 'db.php';?>
</head>
<body>
</body>
</html>
<?php include 'nav.php';?>
	<div class="container">
		<div class="col-md-12">
			<form action="" method="POST">
				<div class="form-group">
				    <label for="exampleInputEmail1">Username</label>
				    <input type="text" class="form-control" id="exampleInputEmail1"  name="username" placeholder="Ex: Administrator">
				 </div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Password</label>
				    <input type="password" class="form-control" id="exampleInputEmail1"  name="password" placeholder="Ex: Password">
				 </div>
				<div class="form-group">
					<input type="submit" value="Submit" name="submit" class="btn btn-default">					
				 </div>
			</form>
		</div>
	</div>
</body>
</html>

<?php

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query    = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$run      = mysqli_query($conn,$query);

		if(mysqli_num_rows($run)>0){
			header('Location: add.php');
		}else{
			echo 'Wrong username or password!';
		}
	}

?>