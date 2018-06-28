<?php //include config
require_once('../includes/config.php');

// jesli nie jest zalogowany to przekieruj do strony logowania
if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Dodaj wpis</title>
  <link rel="stylesheet" href="../style/bootstrap.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=grohfepaujl3prsuact9mydqm66xnufwr82hdbwrf5r7llk3"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              language_url: './tinymce/langs/pl.js',
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"

          });
  </script>
</head>
<body>
<main class="container">
<div id="wrapper">

	<?php include('menu.php');?>
	<p><a href="./">&larr; wróć</a></p>

	<h2>Dodaj wpis</h2>
  <?php echo date('d.m.Y, G:i:s'); ?>
	<?php

	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		extract($_POST);

		if($postTitle ==''){
			$error[] = 'Wpisz tytuł.';
		}

		if($postDesc ==''){
			$error[] = 'Wpisz opis.';
		}

		if($postCont ==''){
			$error[] = 'Wpisz treść posta.';
		}

		if(!isset($error)){

			try {

				$stmt = $db->prepare('INSERT INTO blog_posts (postTitle,postDesc,postCont,postDate) VALUES (:postTitle, :postDesc, :postCont, :postDate)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postDesc' => $postDesc,
					':postCont' => $postCont,
          ':postDate' => date('Y-m-d H:i:s')
				));

				header('Location: index.php?action=dodany');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>

		<p><label>Tytuł</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>

		<p><label>Opis</label><br />
		<textarea name='postDesc' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>

		<p><label>Treść wpisu</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea></p>

		<p><input type='submit' name='submit' value='Dodaj'></p>

	</form>

</div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
