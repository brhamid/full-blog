<?php
include './config.php';
if (isset($_POST['submit'])){
    include './config.php';

	$name = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['name']));
	$surname = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['surname']));
	$username = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['username']));
	$email = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['email']));
	$phone = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['phone']));
	$workplace = htmlspecialchars(mysqli_real_escape_string($connection, $_POST['workplace']));

	// profil şəkli üçün ayarlamalar
	$profile = $_FILES['profile']['name'];
	$profile_size = $_FILES['profile']['size'];
	$profile_tmp_name = $_FILES['profile']['tmp_name'];
	$profile_folder = './images/'.$profile;

	$password = mysqli_real_escape_string($connection, $_POST['password']);
	$password_confirm = mysqli_real_escape_string($connection,$_POST['password_confirm']);

	$select = mysqli_query($connection, "SELECT * FROM `signup` WHERE (email = '$email') or username = '$username'");
    
	$regex = "/^[A-Z]+$/i";
	if(mysqli_num_rows($select) > 0){
		$message[] = 'istifadəçi mövcuddur.'; 
	}else{
		if($password != $password_confirm){
			$message[] = "şifrələr uyğun gəlmir.";
		}elseif(strlen($password)<5){
			$message[] = 'şifrə 5 simvoldan qısa olmamalıdır';
		}
		elseif($profile_size> 2000000){
			$message[] = 'profil şəklinin ölçüsü çox böyükdür.';
		}elseif(strlen($username)<5){
			$message[] = 'istifadəçi adı 5 simvoldan qısa olmamalıdır';
		}elseif(str_contains($username, ' ')){
			$message[] = 'istifadəçi adında boşluq olmamalıdır.';
		}elseif(str_contains($surname, ' ') || str_contains($name, ' ')){
			$message[] = 'Ad/Soyad hissəsində boşluq olmamalıdır.';
		}elseif(!preg_match($regex, $username) or !preg_match($regex, $name)){
			$message[] = 'Ad/Soyad hissəsində ancaq hərflər olmalıdır.';
		}
		else{
			$password = md5($password);
            $insert = mysqli_query($connection, "INSERT INTO signup (name, surname, username, email, phone, workplace, profile, password) VALUES ('$name', '$surname', '$username', '$email', '$phone', '$workplace','$profile', '$password')");
			if ($insert) {
				move_uploaded_file($profile_tmp_name, $profile_folder);
    			header('location: ../simple-blog/user.php');
			}else{
				$message[] = 'Qeydiyyat zamanı xəta baş verdi. Yenidən yoxlayın.';
			}
		}
	}
}

?>