<?php
include 'config.php';
session_reset();
session_destroy();
session_start();


if (isset($_POST['submit'])){

	$email = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email']));

	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$password = md5($password);

	$select = mysqli_query($connection, "SELECT * FROM `signup` WHERE email = '$email' AND password = '$password'");

	if(mysqli_num_rows($select)> 0 and $email==='admin@gmail.com'){
		$row = mysqli_fetch_assoc($select);
		$_SESSION['user_id'] = $row['username'];
		header('location: ../simple-blog/index.php');

	}
	elseif (mysqli_num_rows($select) > 0) {
		$row = mysqli_fetch_assoc($select);
		$_SESSION['user_id'] = $row['username'];
		$_SESSION['profile'] = $row['profile'];
		header('location:../simple-blog/user.php');
	}else{
		$message[] = 'İstifadəçi adı və ya şifrə yanlışdır. Yenidən yoxlayın';
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daxil Ol</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	
   
</head>
<body>
	<div class="main">  	
		
		<!--Qeydiyyat hissəsi-->
			<div class="signup">
				<form action="" method="POST">
					<label for="check" aria-hidden="true">Daxil Ol</label>
					<?php
					
					if(isset($message)){
						foreach($message as $message){
							echo '<p class="message">' . $message.'</p>';
						}
					}
					?>

					<input type="email" name="email" placeholder="e-poçt*" required="" >
					<input type="password" name="password" placeholder="şifrə*" required="">
					<button type="submit" name="submit">Daxil Ol</button>
                    <div class="quest_div"><p class="question">hesabın yoxdur? <a href="signup.php">qeydiyyatdan keç</a></p></div>
				</form>
			</div>
			

			
			
	</div>

</body>
</html>