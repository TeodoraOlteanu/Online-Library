<?php

include('db_connection.php');
require_once 'controllers/authController.php';

$tip1_check=0;
$tip2_check=0;

	$query = "
		SELECT * FROM books
	";
    
    if(isset($_POST["action"]))
    {
        if(isset($_POST["tip"]))
            {
                $tip_filter = implode("','", $_POST["tip"]);
                $query .= "
                WHERE author IN('".$tip_filter."')
                ";
                $tip1_check = 1;
            }

            $statement = $myPDO->prepare($query);
            $statement->execute();
            $result = $statement->fetchAll();
            $total_row = $statement->rowCount();
            $output = '';

        
            if($total_row > 0)
            {
                foreach($result as $row)
                {
                    $author = $row["author"];
                    $output .= '
                        <form method="post" action = "books.php" method = "post">
                            <p align="center" class = "title">'. $row["name_book"] .'</p>
                            <p align="center">'. $row["author"] .'</p>
                            <p align="center">'. $row["overview"] .'</p>
                            <p align="center">'. $row["genre"] .'</p>
                            <input type="hidden" name="hidden_id" value="'. $row["id_book"] .'" />
                            <input type="hidden" name="hidden_name" value="'. $row["name_book"] .'" />
                            <input type="hidden" name="hidden_author" value="'. $row["author"] .'" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                            </form>';
                }
            }
            else
            {
                $output = '<h3>No Data Found</h3>';
            }
            echo $output;
        }



      


   
     
