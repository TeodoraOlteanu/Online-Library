<?php
include('db_connection.php');
require_once 'controllers/authController.php';
?>

<?php
if(isset($_POST["add_to_cart"]))
    {
    
        if(isset($_SESSION["shopping_cart"]))
        {
            $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
            if(in_array($_POST["hidden_id"], $item_array_id))
            {

                echo '<script>alert("Item Already Added")</script>';
                //echo "<script>window.location = 'books.php'</script>";
            }
            else
            {
                $count = count($_SESSION["shopping_cart"]);
                $item_id = $_POST['hidden_id'];
                $item_name = $_POST['hidden_name'];
                $item_author = $_POST['hidden_author'];

                //echo "      nume autor: ";
               // echo $_POST['hidden_author'];
               // $item_quantity = $_POST["quantity"];
                /*$item_array = array(
                    'item_id'			=>	$_GET["hidden_id"],
                    'item_name'			=>	$_POST["hidden_name"],
                    'item_author'		=>	$_POST["hidden_author"],
                    'item_quantity'		=>	$_POST["quantity"]
                );*/
                $item_array = array(
                    'item_id'			=>	$item_id,
                    'item_name'			=>	$item_name,
                    'item_author'		=>	$item_author
                   // 'item_quantity'		=>	$_POST["quantity"]
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
            }
        }
        else
        {   //$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");

            $item_array = array(
                'item_id'			=>	$_POST["hidden_id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_author'		=>	$_POST["hidden_author"],
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    ?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <title>Posts</title>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="project.css">

 </head>
 <body>



 <div class = "btn2">
    <a href="shopping_cart.php">
        <h5>Cart
            <?php
                if (isset($_SESSION['shopping_cart'])){
                $count = count($_SESSION['shopping_cart']);
                echo $count;
            }
                else
                {
                    echo 0;
                }                        
            ?>
        </h5>
    </a>
    </div>


 <div class="container">
  <form class="form-inline" method="post" action="search.php" target="_blank">
    <input type="text" name="name_book" class="form-control" placeholder="Search book by name...">
    <button type="submit" name="save" class="btn btn-primary">Search</button>

  </form>
</div>



 <div class="header">
        <h3>Autor</h3>
        <div class="filter">
        <?php

        $query = "SELECT DISTINCT(author) FROM books ORDER BY author";
        $statement = $myPDO->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        foreach($result as $row)
        {
        ?>
        <div class="list-group-item checkbox">
            <label><input type="checkbox" class="common_selector tip" value="<?php echo $row['author']; ?>"  > <?php echo $row['author']; ?></label>
        </div>
        <?php
        }

        ?>
        </div>
    </div>

<div>
    <br />
    <div class="filter_data">
    </div>
</div>
</div>

<style>
#loading
{
text-align:center; 
background: url('loader.gif') no-repeat center; 
height: 150px;
}
</style>

<script>
$(document).ready(function(){

filter_data();

function filter_data()
{
$('.filter_data').html('<div id="loading" style="" ></div>');
var action = 'fetch_data';
var tip = get_filter('tip');
$.ajax({
url:"fetch_data.php",
method:"POST",
data:{action:action, tip:tip},
success:function(data){
    $('.filter_data').html(data);
}
});
}

function get_filter(class_name)
{
var filter = [];
$('.'+class_name+':checked').each(function(){
filter.push($(this).val());
});
return filter;
}

$('.common_selector').click(function(){
filter_data();
});

});
</script>

 </body>
 </html>