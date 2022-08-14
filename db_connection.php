<?php

try
{
    $myPDO = new PDO("pgsql:host=localhost,dbname=postgres","postgres","Bumbilici77");
}catch(PDOException $e)
{
    echo $e->getMessage();
}

?>