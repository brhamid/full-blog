<?php
  
if(empty($_SESSION)){
  echo "Try again";

  die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>
      .nav-link, .navbar-brand{
        color: white !important;
      }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <a class="navbar-brand" href="<?php echo ROOT_URL;?>user.php">PHP Blog</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav  ml-auto">
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo ROOT_URL; ?>user.php">|<?php echo " Xoşgəldin, "; print_r($_SESSION['user_id']); ?><span class="sr-only">(current)</span> |</a>
      </li>
    

      <li class="nav-item">
        <a style="color: white;" class="nav-link" href="#">Əlaqə |</a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="../registration/login.php
        ">Çıxış</a>
        

      </li>
     
    </ul>
  </div>
</nav>
</body>
</html>