<?php
include "./config/db.php";
include "./config/config.php";


if(isset($_POST['delete'])){

    $delete_id = mysqli_real_escape_string($connection,$_POST['delete_id']);
    


    $query = "DELETE FROM posts where id = {$delete_id};
    
    ";

    if(mysqli_query($connection, $query)){
        header('Location: '. ROOT_URL.'');
    }else{
        echo 'Error'. mysqli_error($connection);
    }

}

$id = mysqli_real_escape_string($connection, $_GET['id']);
$query = 'SELECT * FROM posts WHERE id= '. $id;

$result = mysqli_query($connection,$query);
$post = mysqli_fetch_assoc($result);

mysqli_free_result($result);

mysqli_close($connection);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .container{
            padding: 50px;

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
<a href="<?php echo 'http://localhost/blog-website/simple-blog/user.php';?>" class="btn btn-primary">Geri Qayıt</a>
    <div class="container">
       
        <h1><?php echo $post['title'];?></h1>
            <small><?php echo $post['created_at']; ?> tarixində <b><?php echo $post['author']; ?></b> tərəfindən</small>
            <hr>
            <p> <?php echo $post['body'];?> </p>
            <hr>
    </div>
</body>
</html>