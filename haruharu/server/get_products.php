<?php

include('server/connection.php');

$statement = $connection->prepare("SELECT * FROM products");

$statement->execute();

$featured_products = $statement->get_result();

?>