<?php //include config
require_once('../includes/config.php');

//jesli nie zalogowany to przenies do strony login.php
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Edit User</title>
  <link rel="stylesheet" href="../style/bootstrap.css">
  <link rel="stylesheet" href="../style/main.css">
</head>
<body>
<main class="container">


<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="users.php">&larr; wróć</a></p>

	<h2>Edycja użytkownika</h2>


	<?php

	//jesli formularz wysłano to go przetwórz
	if(isset($_POST['submit'])){

		//zbierz dane
		extract($_POST);

		//prosta walidacja
		if($username ==''){
			$error[] = 'Proszę podać nazwę użytkownika.';
		}

		if( strlen($password) > 0){

			if($password ==''){
				$error[] = 'Proszę podać hasło.';
			}

			if($passwordConfirm ==''){
				$error[] = 'Proszę potwierdzić hasło.';
			}

			if($password != $passwordConfirm){
				$error[] = 'Hasła się różnią.';
			}

		}


		if($email ==''){
			$error[] = 'Proszę podać adres email.';
		}

		if(!isset($error)){

			try {

				if(isset($password)){

					$hashedpassword = $user->password_hash($password, PASSWORD_BCRYPT);

					//aktualizacja w bazie danych - update
					$stmt = $db->prepare('UPDATE blog_members SET username = :username, password = :password, email = :email WHERE memberID = :memberID') ;
					$stmt->execute(array(
						':username' => $username,
						':password' => $hashedpassword,
						':email' => $email,
						':memberID' => $memberID
					));


				} else {

					//aktualizuj baze danych
					$stmt = $db->prepare('UPDATE blog_members SET username = :username, email = :email WHERE memberID = :memberID') ;
					$stmt->execute(array(
						':username' => $username,
						':email' => $email,
						':memberID' => $memberID
					));

				}


				//przekieruj do strony isers.php
				header('Location: users.php?action=zaktualizowany');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	?>


	<?php
	//czy sa bledy?
	if(isset($error)){
		foreach($error as $error){
			echo $error.'<br />';
		}
	}

		try {

			$stmt = $db->prepare('SELECT memberID, username, email FROM blog_members WHERE memberID = :memberID') ;
			$stmt->execute(array(':memberID' => $_GET['id']));
			$row = $stmt->fetch();

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}

	?>

	<form action='' method='post'>
		<input type='hidden' name='memberID' value='<?php echo $row['memberID'];?>'>

		<p><label>Nazwa użytkownia</label><br />
		<input type='text' name='username' value='<?php echo $row['username'];?>'></p>

		<p><label>Hasło (tylko w przypadku zmiany)</label><br />
		<input type='password' name='password' value=''></p>

		<p><label>Potwierdź hasło</label><br />
		<input type='password' name='passwordConfirm' value=''></p>

		<p><label>Email</label><br />
		<input type='text' name='email' value='<?php echo $row['email'];?>'></p>

		<p><input type='submit' name='submit' value='Zaktualizuj'></p>

	</form>

</div>
</main>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
