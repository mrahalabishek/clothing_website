<?php
    //if categoryID is not set, redirect to index.php
    if(!isset($_GET['categoryID'])) {
        header("Location: index.php");
    }

    //select allstock items belonging to the selected categoryID
    $stock_sql="SELECT stock.stockID, stock.name, stock.price, stock.thumbnail, stock.categoryID, category.name AS catname FROM stock JOIN category ON (stock.categoryID=category.categoryID) WHERE stock.categoryID=".$_GET['categoryID'];
    //check to see above query is working
    //echo $stock_sql;
    //run the query
    if($stock_query=mysqli_query($dbconnect, $stock_sql)) {
        //if the query is successful, create a variable to store the results
        $stock_rs=mysqli_fetch_assoc($stock_query);
    }
?>