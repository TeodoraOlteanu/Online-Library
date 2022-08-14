<?php require_once 'controllers/authController.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Information</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="project.css">

      </head>
      <body>
        
      <div class="header">
      	<h1 class="h1">Information</h1>
          <p>Username: <?php echo $_SESSION['username']; ?></p>
          <p>Email: <?php echo $_SESSION['email']; ?></p>
          <p>Orders: Check my orders</p>
      </div>
      
      </body>
</html>