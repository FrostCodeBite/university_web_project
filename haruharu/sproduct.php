<?php

include('server/connection.php');

if(isset($_GET['product_id'])) {
    

    $product_id = $_GET['product_id'];

    $statement = $connection->prepare("SELECT * FROM products WHERE product_id = ?");
    $statement->bind_param("i", $product_id);

    $statement->execute();

    $product = $statement->get_result();

} else {
    header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Haru Haru</title>

        <link rel="stylesheet" href="style.css">

        <script src="https://kit.fontawesome.com/db97bed7fd.js" crossorigin="anonymous"></script>

    </head>
    <body>

        <?php include('header.php'); ?>

        <section id="prodetail" class="section-p1">

            <?php while($row = $product->fetch_assoc()) { ?>  
        
            <div class="single-pro-image">
                <img src="images/product1/<?php echo $row['image1'] ?>" id="MainImg" alt="">

                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="images/product1/<?php echo $row['image1'] ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="images/product1/<?php echo $row['image2'] ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="images/product1/<?php echo $row['image3'] ?>" width="100%" class="small-img" alt="">
                    </div>
                    <div class="small-img-col">
                        <img src="images/product1/<?php echo $row['image3'] ?>" width="100%" class="small-img" alt="">
                    </div>
                </div>
            </div>

            <div class="single-pro-detail">
                <h6><?php echo $row['category'] ?></h6>
                <h4><?php echo $row['name'] ?></h4>
                <h2>$<?php echo $row['price'] ?></h2>
                <select>
                    <option>Option 1</option>
                    <option>Option 2</option>
                    <option>Option 3</option>
                    <option>Option 4</option>
                </select>
                <input type="number" value="1">
                <button class="invnormal">Add To Cart</button>
                <h4>Product Details</h4>
                <span><?php echo $row['description'] ?></span>
            </div>

            <?php } ?>
        
        </section>

        <?php include('featured_products.php'); ?>

        <?php include('footer.php'); ?>

        <script src="script.js"></script>

    </body>

    

</html>