<?php
$connection = mysqli_connect('localhost', 'root', '', 'phpblog');

if(mysqli_connect_errno()){
    echo "Failed to connect " . mysqli_connect_errno();
}
?>
