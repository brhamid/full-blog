<?php
include "./config/db.php";
include "./config/config.php";

session_start();

$user_id = $_SESSION['user_id'];
$us = $_SESSION['us'];
$photo = $_SESSION['profile'];

$query = 'SELECT * FROM posts ORDER BY created_at DESC';
$result = mysqli_query($connection,$query);
$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_free_result($result);

mysqli_close($connection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Blog</title>
    
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
    <link rel="stylesheet" href="./user.css">
    
    
</head>
<body>
<?php
include('navbar_user.php');
?>

<?php foreach($posts as $post):  ?>
<div class="blog-card">
    <div class="meta">
    
    
      <ul class="details">
        <li class="author"><a href="#"><?php echo $post['author']; ?> tərəfindən </a></li>
        <li class="date"><?php echo $post['created_at']; ?> tarixində </li>
      </ul>
    </div>
    <div class="description">
      <h1><?php echo $post['title'];?></h1>
      <h2><?php echo $post['author']; ?></h2>
      <p><?php echo $post['summary']; ?></p>
      <p class="read-more">
      <a class="btn btn-primary" href="<?php echo ROOT_URL;?>post_user.php?id=<?php echo $post['id']; ?>">Davamını Oxu</a>
      </p>
    </div>
    
  </div>
  <?php endforeach; ?>
<!-- after post -->
   
        
   
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>