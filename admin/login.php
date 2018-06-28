<?php
//include config
require_once('../includes/config.php');


//sprawdz czy nie jest juz zalogowany
if( $user->is_logged_in() ){ header('Location: index.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Logowanie do panelu admina</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <link rel="stylesheet" href="../style/floating-labels.css">
  <link rel="stylesheet" href="../style/bootstrap.css">
  <link rel="stylesheet" href="../style/main.css">

</head>
<body>
<div class="container text-center mb-4">
  <h1 class="h3 mb-3 font-weight-normal">Zaloguj</h1>
          <p>Przykładowe dane do logowania:<br>
            Nazwa użytkownika: <code>demo</code><br>
            Hasło: <code>demo</code>
	<?php

	// jak wyslany formularz to zaloguj
	if(isset($_POST['submit'])){

		$username = trim($_POST['username']);
		$password = trim($_POST['password']);

		if($user->login($username,$password)){

			//jesli zalogowany to przenies na index.php
			header('Location: index.php');
			exit;


		} else {
			$message = '<p class="error">Wrong username or password</p>';
		}

	}//koniec if submit

	if(isset($message)){ echo $message; }
	?>

	<form class="form-signin" action="" method="post">
  <div class="form-label-group">
      <input type="text" id="username" name="username" class="form-control" placeholder="Nazwa użytkownika" required autofocus>
      <label for="username">Nazwa użytkownika</label>
  </div>
  <div class="form-label-group">
        <input type="password" id="password" name="password"  class="form-control" placeholder="Hasło" required>
        <label for="inputPassword">Hasło</label>
      </div>

	<p><label></label><input class="btn btn-lg btn-primary btn-block"  type="submit" name="submit" value="Zaloguj"  /></p>
	</form>

</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>
