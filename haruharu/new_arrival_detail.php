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

        <section id="product" class="section-p1">
            <h2>New Arrival</h2>
            <p>Bring Beauty to Your Everyday!</p>

            <div class="pro-container">

            <?php include('server/get_new_arrival.php'); ?>

            <?php while($row = $featured_products->fetch_assoc()){ ?>


                <div class="pro" onclick="window.location.href='<?php echo'sproduct.php?product_id='. $row['product_id'];?>'">
                    <img src="images/product1/<?php echo $row['image1'];?>" alt="">
                    <div class="desc">
                        <span><?php echo $row['category'];?></span>
                        <h5><?php echo $row['name'];?></h5>
                        <h4>$<?php echo $row['price'];?></h4>
                    </div>
                    <a href="#" class="cart"><i class="fa-solid fa-cart-shopping"></i></a>
                </div>

            <?php } ?>
            
            </div>

        </section>

        <?php include('footer.php'); ?>

        <script src="script.js"></script>

    </body>

    

</html>