<?php

    include('server/connection.php');

    if(isset($_POST['input'])) {
        $input = $_POST['input'];

        $query = "SELECT DISTINCT brand FROM products WHERE brand LIKE '${input}%' LIMIT 5";
        $result = mysqli_query($connection, $query);

        // echo "<ul><li>Hello</li></ul>";

        if(mysqli_num_rows($result) > 0) {?>

            <?php 
                
                while($row = mysqli_fetch_assoc($result)) {
                    $brand = $row['brand'];
                    ?><ul><li onclick=selectInput(this)><?php echo $brand; ?></li></ul><?php
                }
            ?>
        <?php

        } else {
            echo "<ul><li>No Result</li></ul>";
        }
    }
?>

<script>

    const inputBox = document.getElementById('input-box');

    function selectInput($brand) {
        inputBox.value = $brand.innerHTML;
        $(".result-box").css("display","none");
        
    }

    if (inputBox.value.is_null) {
        <?php echo "Empty";?>
    }



</script>