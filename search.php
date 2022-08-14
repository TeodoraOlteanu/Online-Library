<?php
include('db_connection.php');
require_once 'controllers/authController.php';

function find_book_by_title(\PDO $pdo, string $keyword): array
{
    $pattern = '%' . $keyword . '%';
    $pattern = strtoupper($pattern);

    $sql = "SELECT * FROM books 
        WHERE UPPER(name_book) LIKE :pattern";

    $statement = $pdo->prepare($sql);
    $statement->execute([':pattern' => $pattern]);

    return  $statement->fetchAll(PDO::FETCH_ASSOC);
}

/*if(count($_POST)>0) 
        {
            $name_book=$_POST["name_book"];
            echo $name_book;
            $sql = "SELECT * FROM books where name_book LIKE ':name_book %' ";
            $stmt = $myPDO->prepare($sql);
            $stmt->bindValue('name_book',$name_book);
            $stmt->execute(array(":name_book" => $name_book));
        
            echo $sql;
        }*/

        $result = find_book_by_title($myPDO, $_POST["name_book"]);


       // $result = $stmt->fetchAll();
        $output = '';

                foreach($result as $row)
                {
                    $output .= '
                    <form method="post" action = "search.php" method = "post">
                            <p class = "title">'. $row["name_book"] .'</p>
                            <p>'. $row["author"] .'</p>
                            <p>'. $row["overview"] .'</p>
                            <p>'. $row["genre"] .'</p>
                        </form>
                    ';
                }
            echo $output;
       
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="project.css">

</head>
<body>
    
</body>
</html>