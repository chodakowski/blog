<?php
//include config
require_once('../includes/config.php');

if(!$user->is_logged_in()){ header('Location: login.php'); }

//pokaz info ze dodano/usunieto strone
if(isset($_GET['delpost'])){

	$stmt = $db->prepare('DELETE FROM blog_posts WHERE postID = :postID') ;
	$stmt->execute(array(':postID' => $_GET['delpost']));

	header('Location: index.php?action=usunieto');
	exit;
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="../style/bootstrap.css">
  <link rel="stylesheet" href="../style/main.css">
	<script language="JavaScript" type="text/javascript">
  function delpost(id, title)
  {
	  if (confirm("Czy jesteś pewien, że chcesz usunąć '" + title + "'"))
	  {
	  	window.location.href = 'index.php?delpost=' + id;
	  }
  }
  </script>
</head>
<body>
<main class="container">


	<div id="wrapper">

	<?php include('menu.php');?>

	<?php
	// pokaz wiadomosc ze dodano/usunieto strone
	if(isset($_GET['action'])){
		echo '<h3>Wpis '.$_GET['action'].'.</h3>';
	}
	?>

	<table class="table table-striped table-hover">
	<thead class="thead-dark">

	<tr>
		<th>Tytuł</th>
		<th>Data</th>
		<th>Akcja</th>
	</tr>
</thead>
<tbody>
	<?php
		try {

			$stmt = $db->query('SELECT postID, postTitle, postDate FROM blog_posts ORDER BY postID DESC');
			while($row = $stmt->fetch()){

				echo '<tr>';
				echo '<td>'.$row['postTitle'].'</td>';
				echo '<td>'.date('d.m.Y, G:m', strtotime($row['postDate'])).'</td>';
				?>

				<td>
					<a class="btn btn-outline-info btn-sm" href="edit-post.php?id=<?php echo $row['postID'];?>">Edytuj</a> &nbsp;
					<a class="btn btn-outline-danger btn-sm" href="javascript:delpost('<?php echo $row['postID'];?>','<?php echo $row['postTitle'];?>')">Usuń</a>
				</td>

				<?php
				echo '</tr>';

			}

		} catch(PDOException $e) {
		    echo $e->getMessage();
		}
	?>
</tbody>
	</table>

	<p><a class="btn btn-outline-success" href='add-post.php'>Dodaj wpis</a></p>

</div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

</body>
</html>
