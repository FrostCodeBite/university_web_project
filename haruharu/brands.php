<?php
include('server/connection.php');

if(isset($_POST['input-box'])) {
    $result = $_POST['input-box'];

    $statement2 = $connection->prepare("SELECT * FROM products WHERE brand = ?");
    $statement->bind_param("i", $result);
    $statement2->execute();
    $featured_products = $statement2->get_result();
    
} else {
    if(isset($_GET['page_no']) && $_GET['page_no'] != "") {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }
    
    $statement = $connection->prepare("SELECT COUNT(*) AS total_records FROM products");
    $statement->execute();
    $statement->bind_result($total_records);
    $statement->store_result();
    $statement->fetch();
    
    $total_records_per_page = 40;
    $offset = ($page_no-1)*$total_records_per_page;
    $previous_page = $page_no-1;
    $next_page = $page_no+1;
    
    $total_no_of_page = ceil($total_records/$total_records_per_page);
    
    $statement2 = $connection->prepare("SELECT * FROM products LIMIT $offset,$total_records_per_page");
    $statement2->execute();
    $featured_products = $statement2->get_result();
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

        <section id="search-box" class="section-p1" action="brand.php" method="POST">
            <div class="row">
                <input type="text" id="input-box" name="input-box" placeholder="Search for Brands" autocomplete="off">
                <!-- <button class="invnormal"><i class="fa-solid fa-magnifying-glass"></i></button> -->
            </div>

            <div class="result-box" name="result-box">
                
            </div>
        </section>

        <section id="product" class="section-p1">
            <h2>Top Brands</h2>
            <p>Bring Beauty to Your Everyday!</p>

            <div class="pro-container">

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

        <section id="pagination" class="section-p1">
            <a href="<?php if($page_no<=1){echo '#';} else {echo '?page_no='.($page_no-1);} ?>" 
            <?php if($page_no<=1){echo 'disabled';}?>><i class="fa-solid fa-arrow-left"></i></a>
            <a href="?page_no=1">1</a>
            <a href="?page_no=2">2</a>
            <a href="#">of <?php echo $total_no_of_page ?></a>

            <?php if($page_no >= 3) {?>
                <a href="<?php echo "?page_no=".$page_no ?>"><?php echo $page_no ?></a>

            <?php }?>

            <a href="<?php if($page_no>=$total_no_of_page){echo '#';} else {echo '?page_no='.($page_no+1);} ?>" 
            <?php if($page_no>=$total_no_of_page){echo 'disabled';}?>><i class="fa-solid fa-arrow-right"></i></a>
        </section>

        <?php include('footer.php'); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script type="text/javascript">

                $(document).ready(function(){
                    $("#input-box").keyup(function(){
                        var input = $(this).val();
                        // alert(input);

                        if(input != "") {
                            $(".result-box").css("display","block");
                            $.ajax({
                                url: "get_brand.php",
                                method: "POST",
                                data:{input:input},

                                success:function(data) {
                                    $(".result-box").html(data);
                                    
                                }
                            });
                        } else {
                            $(".result-box").css("display","none");
                        }
                    });
                });

        </script>


        <!-- <script src="script.js"></script> -->
    </body>

    

</html>