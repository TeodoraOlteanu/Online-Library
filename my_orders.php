<?php
include('db_connection.php');
require_once 'controllers/authController.php';

$email = $_SESSION['email'];
$sql = "SELECT * FROM orders WHERE email=:email";
$stmt = $myPDO->prepare($sql);
$stmt->bindValue('email',$email);
$stmt->execute(array(":email" => $email));
$result = $stmt->fetchAll();
//echo $result;

foreach($result as $row)
{
    //echo "Order id number: ";
   // echo $row['id_order'];
    $array = explode(",", $row['items']);
    $output = '';

    $output .= '<div class="header">
    <h3>Order id number: '. $row['id_order'] .'</h3> <br>';

    foreach($array as $id_book)
    {
        if($id_book != null)
        {
            $sql = "SELECT * FROM books WHERE id_book=:id_book";
            $stmt = $myPDO->prepare($sql);
            $stmt->bindValue('id_book',$id_book);
            $stmt->execute(array(":id_book" => $id_book));
            $result2 = $stmt->fetch();
    
            $output .= '<p>Book: '. $result2['name_book'] .'</p> 
                        <p>Author: '. $result2['author'] .'</p> 
                        <br>';

            
        }

    }
    $output .= '</div>';
    echo $output;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="project.css">
    <title>Orders</title>
</head>
<body>
    
</body>
</html>