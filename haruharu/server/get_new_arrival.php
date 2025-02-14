<?php

include('server/connection.php');

$statement = $connection->prepare("SELECT * FROM products WHERE new_arrival = 1");

$statement->execute();

$featured_products = $statement->get_result();

?>