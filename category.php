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

    if(mysqli_num_rows($stock_query)==0) {
        echo"Out of stock";
    }else{
        ?>
        <h1><?php echo $stock_rs['catname']?></h1>
        <?php do {
            ?>
            <div class="item">
            <p><?php echo $stock_rs['name']; ?></p>
            <p>$<?php echo $stock_rs['price']; ?></p>
            </div>
        <?php
        }while($stock_rs=mysqli_fetch_assoc($stock_query));
        ?>
    <?php
    }
?>