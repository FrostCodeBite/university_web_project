<section id="product" class="section-p1">

    <h2>New Arrival</h2>
    <p>Bring Beauty to Your Everyday!</p>

    <div class="pro-container">

    <?php include('server/get_new_arrival.php'); ?>

    <?php $i=0;
    
    while($row = $featured_products->fetch_assoc()){ 
        
        if($i < 4) {?>  

        <div class="pro" onclick="window.location.href='<?php echo'sproduct.php?product_id='. $row['product_id'];?>'">
            <img src="images/product1/<?php echo $row['image1']?>" alt="">
            <div class="desc">
                <span><?php echo $row['category']?></span>
                <h5><?php echo $row['name']?></h5>
                <h4>$<?php echo $row['price']?></h4>
            </div>
            <a href="#" class="cart"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>

    <?php $i++;} else {break;} } ?>

    </div>

    <button onclick="location.href='new_arrival_detail.php'" class="invnormal" style="margin-top: 20px;">See More</button>

</section>