<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
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

  <main role="main" class="container">
	<div id="wrapper">

		<h1>Wpisy</h1>
		<hr />

		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
				while($row = $stmt->fetch()){

					echo '<div class="card effect2">';
						echo '<h3 class="card-header"><a class="text-dark" href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h3>';
            echo '<div class="card-body">';
						      echo '<p>Opublikowano: '.date('d.m.Y, H:i:s', strtotime($row['postDate'])).'</p>';
						      echo '<p>'.$row['postDesc'].'</p>';
            echo '</div>';
            echo '<p class="card-footer"><a class="btn btn-outline-info" href="viewpost.php?id='.$row['postID'].'">Czytaj więcej...</a></p>';
					echo '</div>';
          echo '<br>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
