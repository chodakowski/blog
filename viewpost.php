<?php require('includes/config.php');

$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
$stmt->execute(array(':postID' => $_GET['id']));
$row = $stmt->fetch();

//if post does not exists redirect user.
if($row['postID'] == ''){
	header('Location: ./');
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['postTitle'];?></title>
    <link rel="stylesheet" href="style/bootstrap.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <a class="navbar-brand" href="#">ProgInt.egz</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">

        <form class="form-inline mt-2 mt-md-0">
          <a class="btn btn-outline-info" href="./admin/login.php" role="button">Zaloguj</a>&nbsp;
        </form>
      </div>
    </nav>

<main class="container">
	<div id="wrapper">

		<!-- <h1>Blog</h1>
		<hr /> -->
		<p><a href="./">&larr; wróć</a></p>


		<?php
			echo '<div class="card effect2">';
				echo '<h1 class="card-header">'.$row['postTitle'].'</h1>';
				echo '<div class="card-body">';
				echo '<p class="text-muted">Opublikowano: '.date('d.m.Y, G:i:s', strtotime($row['postDate'])).'</p>';
				echo '<p class="">'.$row['postCont'].'</p>';
				echo '</div>';
			echo '</div>';
		?>

	</div>
</main>
</body>
</html>
