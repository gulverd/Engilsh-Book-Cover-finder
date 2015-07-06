<html>
<head>
<title>Covers Portal</title>

<script src="jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="jquery.easing.min.js" type="text/javascript"></script>
<link href="css/bootstrap.min.css" rel="stylesheet">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="styles.css" />
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
<?php include 'nav.php';?>
	<div class="container">
		<div class="col-md-12">
			<div class="bs-callout bs-callout-info" id="callout-helper-bg-specificity" id="header">
				<h4 id="dealing-with-specificity"><b>გთხოვთ გაიაროთ ავტორიზაცია:</b><a class="anchorjs-link" href="#dealing-with-specificity"><span class="anchorjs-icon"></span></a></h4>
				<p id="title_search">
				   	გთხოვთ შეიყვანოთ თქვენი "USERNAME" "PASSWORD" და დააჭიროთ ღილაკს "დადასტურება".
				</p>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-12" id="gela">
				<form action="" method="POST">
					<div class="form-group">
					    <label for="exampleInputEmail1">Username</label>
					    <input type="text" class="form-control" id="exampleInputEmail1"  name="username">
					 </div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Password</label>
					    <input type="password" class="form-control" id="exampleInputEmail1"  name="password">
					 </div>
					<div class="form-group">
						<input type="submit" value="სისტემაში შესვლა" name="submit" class="btn btn-default">					
					 </div>
				</form>
			</div>
		</div>
		<div class="col-md-12">
			<div class="alert alert-info" role="alert" id="adlert_id">
				<a href="reg.php" class="alert-link">რეგისტრაცია</a>
			</div>
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

		// if(mysqli_num_rows($run)>0){

		// 	header('location:main.php?'.$user_id.'488562508999124001236');
		// }else{
		// 	echo 'Wrong username or password!';
		// }

		if(empty($username) or empty($password)){
			echo "შეიყვანეთ მონაცემები!";
		}else{
			while($row = mysqli_fetch_array($run)){
				$user_id = $row[0];
				$usrnm   = $row[3];
				$pass    = $row[4];
				session_start();	
				header('location:main.php?'.$user_id.$usrnm.$pass);
			}
	}
}
?>