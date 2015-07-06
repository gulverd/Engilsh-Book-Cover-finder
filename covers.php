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

    <div class="container">
        <div class="col-md-12">
             <div class="panel panel-default">
                    <div class="panel-body">
    <?php

        $query = "SELECT * FROM book LIMIT 8";
        $run   = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($run)){
            $photo = $row['image'];
            $title = $row['names'];
            $isbn  = $row['isbn'];
            $price = $row['price'];
            $points = $row['points'];
echo "<a href='result.php?".$isbn."'>";
    echo    '<div class="col-md-3" id="thub">
                            <div class="col-md-12" id="pic_id">';
                            echo  '<img src="uploads/'.$photo.'" id="pic">';
    echo                    '</div>';
    echo                    '<div class="col-md-12" id="isbn">';
                            echo  'ISBN:'. " " . $isbn;
    echo                    '</div>
                            <div class="col-md-12">
                                <div class="col-md-6" id="price">
                                    Price:'. " " .$price; 
    echo                        '</div>
                                <div class="col-md-6" id="price">
                                    Point:'. " " .$points;
    echo                         '</div>
                            </div>
                        </div>';
echo '</a>';
        }

    ?>

    
                    </div>
            </div>
        </div>
    </div>
</body>
</html>