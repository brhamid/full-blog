<?php
include "./config/db.php";
include "./config/config.php";

if(isset($_POST['submit'])){
    $title = htmlspecialchars(mysqli_real_escape_string($connection,$_POST['title']));
    $author = htmlspecialchars(mysqli_real_escape_string($connection,$_POST['author']));
    $body = htmlspecialchars(mysqli_real_escape_string($connection,$_POST['body']));
    $summary = htmlspecialchars(mysqli_real_escape_string($connection,$_POST['summary']));

    $title = trim($title);
    $author = trim($author);
    $body= trim($body);
    $summary= trim($summary);

    $query = "INSERT INTO posts(title, author, body, summary) VALUES('$title', '$author', '$body', '$summary')";

    if(mysqli_query($connection, $query)){
        header('Location: '. ROOT_URL.'index.php');
    }else{
        echo 'Error'. mysqli_error($connection);
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body{
    background: url(../registration/background/background.jpg);
}
h1{
    color: white!important;
}
input[value="Əlavə Et"]{ font-weight: 900;
font-size: 20px;
}
</style>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
    

  
</head>
<body>
<?php include('navbar_admin.php');?>

    <div class="container">
        <h1>Yeni Post Əlavə Et</h1>

        <form method="POST" action="<?php $_SERVER['PHP_SELF'];?>">


        <div class="form-group">
            <label for="">Başlıq</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label id="yazar" for="">Yazar</label>
            <input type="text" name="author" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Post</label>
            <textarea type="text" name="body" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="">Özet</label>
            <textarea type="text" name="summary" class="form-control"></textarea>
        </div>
        <input class="btn-block btn btn-primary" type="submit" name="submit" value="Əlavə Et">

    
    
    
    </form>
    </div>

    <!-- jquery cdn'lər -->
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>