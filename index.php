<?php
include('db_connection.php');
require_once 'controllers/authController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="project.css">

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
   <!-- <script src="js/bootstrap.min.js"></script>-->
    <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
   <!-- <link href = "css/jquery-ui.css" rel = "stylesheet">-->
    <!-- Custom CSS -->
   <!-- <link href="css/style.css" rel="stylesheet"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="main.css">
</head>

<body>
<div class="header">
    
    <?php if(isset($_SESSION['message'])): ?>
    <div class="alert <?php echo $_SESSION['alert-class']; ?>"> 
    <?php 
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        unset($_SESSION['alert-class']);
    ?> 
    </div>
    <h3>Welcome, <?php echo $_SESSION['username'];?></h3>
    <?php endif; ?>

    <a class = "title" href="index.php?logout=1">Logout</a>

        </div>
    
    </div>

	<h1 class="h1">Your personal library</h1>

<div class="menu"> 
  <ul>
    <li><a class="link" href="my_orders.php" targer="_blank">my Orders</a></li>
  <li>
    <a class="link" href="information.php" target="_blank">my Info</a>
  </li>
  <li>
    <a class="link" href="books.php" target="_blank">Books</a>
  </li>

</ul> 

<br><br>
<img src="library.jpg" alt="image" height="600" width="1500">
</div>

</body>

 
