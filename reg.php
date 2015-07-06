<html>
<head>
<title>Registration Form</title>

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
	<div class="container">
		<div class="col-md-12">
			<div class="bs-callout bs-callout-info" id="callout-helper-bg-specificity" id="header">
				<h4 id="dealing-with-specificity"><b>მომხმარებლის რეგისტრაციის ფორმა:</b><a class="anchorjs-link" href="#dealing-with-specificity"><span class="anchorjs-icon"></span></a></h4>
				<p id="title_search">
				   	გთხოვთ სწორად შეავსოთ ყველა ველი დააჭიროთ ღილაკს  "დადასტურება".
				</p>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-12" id="gela">
				<form action="" method="POST">
					<div class="form-group">
						<label for="exampleInputEmail1">სახელი</label>
						<input type="text" class="form-control" id="exampleInputEmail1"  name="fname">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">გვარი</label>
						<input type="text" class="form-control" id="exampleInputEmail1"  name="lname">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">მომხმარებლის სახელი (Username)</label>
						<input type="text" class="form-control" id="exampleInputEmail1"  name="username">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">პაროლი</label>
						<input type="password" class="form-control" id="exampleInputEmail1"  name="password" placeholder="მინიმუმ 6 სიმბოლო">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">გაიმეორეთ პაროლი</label>
						<input type="password" class="form-control" id="exampleInputEmail1"  name="password1" placeholder="მინიმუმ 6 სიმბოლო">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">E-mail</label>
						<input type="email" class="form-control" id="exampleInputEmail1"  name="email">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">saswada</label>
						<br>
						<input type="text" name="">
					</div>
					<div class="form-group">
						<input type="submit" value="დადასტურება" name="submit" class="btn btn-default">					
					</div>
				</form>	
			</div>		
		</div>
	</div>
</body>
</html>

<?php
	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$usrna = $_POST['username'];
		$pass1 = $_POST['password'];
		$pass2 = $_POST['password1'];
		$email = $_POST['email'];


 

		$query2 = "SELECT username,email FROM users";
		$run2   = mysqli_query($conn,$query2);

		while($row2 = mysqli_fetch_array($run2)){
			$usr  = $row2['username'];
			$mail = $row2['email'];
		}

		//echo $fname . $lname . $usrna. $pass1. $pass2 .$email;
		if(empty($fname) or empty($lname) or empty($usrna) or empty($pass1) or empty($pass2) or empty($email)){
			echo '<div class="container"><div class="col-md-12">'.'<div class="alert alert-danger" role="alert">'.'გთხოვთ შეავსოთ ყველა ველი!'.'</div>'.'</div>'.'</div>';
		}else{
			if($pass1 != $pass2){
				echo '<div class="container"><div class="col-md-12">'.'<div class="alert alert-danger" role="alert">'.'შეყვანილი პაროლები არ ემთხვევა ერთმანეთს'.'</div>'.'</div>'.'</div>';
			}elseif((strlen($pass1)<6) or (strlen($pass2)<6)){
				echo '<div class="container"><div class="col-md-12">'.'<div class="alert alert-danger" role="alert">'.'პაროლის სიგრძე უნდა იყოს მინიმუმ 6 სიმბოლო'.'</div>'.'</div>'.'</div>';
			}elseif($usrna == $usr){
				echo '<div class="container"><div class="col-md-12">'.'<div class="alert alert-danger" role="alert">'.'მომხმარებელი ასეთი "username-თი" უკვე არსებობს, გთხოვთ სცადოთ სხვა.'.'</div>'.'</div>'.'</div>';
			}elseif($email == $mail){
				echo '<div class="container"><div class="col-md-12">'.'<div class="alert alert-danger" role="alert">'.'ესეთი E-mail-ი უკვე არსებობს სისტემაში, გთხოვთ სცადოთ სხვა.'.'</div>'.'</div>'.'</div>';
			}else{
				$query = "INSERT INTO `users`(`fname`, `lname`, `username`, `password`, `password2`, `email`) VALUES ('$fname','$lname','$usrna','$pass1','$pass2','$email')";
				$run   = mysqli_query($conn,$query);

				header('Location:index.php');		
			}
		}
	}
?>
