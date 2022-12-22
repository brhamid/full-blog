<?php
include './config.php';
include './validation.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qeydiyyatdan Keç</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="main">  	
		
		<!--Qeydiyyat hissəsi-->
			<div class="signup">
				<form action="" method="POST" enctype="multipart/form-data">
					<label for="check" aria-hidden="true">PHP Blog</label>
					<?php
					
					if(isset($message)){
						foreach($message as $message){
							echo '<p class="message">' . $message.'</p>';
						}
					}
					?>

					<input type="text" name="name" placeholder="ad*" required="" value="<?php echo $_POST['name']; ?>">
					<input type="text" name="surname" placeholder="soyad*" required="" value="<?php echo $_POST['surname']; ?>">
					<input type="text" name="username" placeholder="istifadəçi adı*" required="" value="<?php echo $_POST['username']; ?>">
					<input type="email" name="email" placeholder="e-poçt*" required="" value="<?php echo $_POST['email']; ?>">

					<input oninvalid="this.setCustomValidity('Göstərilən nömrə formatını daxil edin: +994XX9999999')" oninput="setCustomValidity('')" pattern="^\+994(50|51|70|77|55|99)\d{7}$" maxlength="13" type="tel" name="phone" placeholder="örnək: +994501111100" 
					value="<?php echo $_POST['phone']; ?>">
					<input type="text" name="workplace" placeholder="iş yeri" value="<?php echo $_POST['workplace']; ?>">

		
					<input accept="image/jpg, image/jpeg, image/png" type="file" name="profile" id="profile">


					<input type="password" name="password" placeholder="şifrə*" required="">
					<input type="password" name="password_confirm" placeholder="şifrə təkrarı" required="">

					<button type="submit" name="submit">Qeydiyyatı Tamamla</button>
                    <div class="quest_div"><p class="question">hesabın var? <a href="login.php">daxil ol</a></p></div>
				</form>
			</div>
			

			
			
	</div>

</body>
</html>