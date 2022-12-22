<?php
$connection = mysqli_connect("localhost", "root", "", "blog-website");

if (!$connection = mysqli_connect("localhost", "root", "", "blog-website")) {
    
    exit("Failed to connect to the database: " . mysqli_connect_error());
}
?>