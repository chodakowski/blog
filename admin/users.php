<?php
//include config
require_once('../includes/config.php');

if(!$user->is_logged_in()){ header('Location: login.php'); }

//pokaz wiadomosc dodano/usunieto uzytkownika
if(isset($_GET['deluser'])){

	//jesli user id jest 1 to ignoruj (zeby nie usunac uzytkownika demo)
	if($_GET['deluser'] !='1'){

		$stmt = $db->prepare('DELETE FROM blog_members WHERE memberID = :memberID') ;
		$stmt->execute(array(':memberID' => $_GET['deluser']));

		header('Location: users.php?action=usuniety');
		exit;

	}
}

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Użytkownicy</title>
  <link rel="stylesheet" href="../style/bootstrap.css">
  <link rel="stylesheet" href="../style/main.css">
  <script language="JavaScript" type="text/javascript">
  function deluser(id, title)
  {
	  if (confirm("Czy chcesz usunąć '" + title + "'"))
	  {
	  	window.location.href = 'users.php?deluser=' + id;
	  }
  }
  </script>
</head>
<body>
<main class="container" >

	<div id="wrapper">

	<?php include('menu.php');?>

	<?php
	// pokaz wiadomosc dodano/usunieto uzytkownika
	if(isset($_GET['action'])){
		echo '<h3>Użytkownik '.$_GET['action'].'.</h3>';
	}
	?>

	<table class="table table-striped table-hover">
	<thead class="thead-dark">
	<tr >
		<th>Nazwa użytkownika</th>
		<th>Email</th>
		<th>Akcja</th>
	</tr>
</thead>
<tbody>
	<?php
		try {

			$stmt = $db->query('SELECT memberID, username, email FROM blog_members ORDER BY username');
			while($row = $stmt->fetch()){

				echo '<tr>';
				echo '<td>'.$row['username'].'</td>';
				echo '<td>'.$row['email'].'</td>';
				?>

				<td>
					<a class="btn btn-outline-primary btn-sm" href="edit-user.php?id=<?php echo $row['memberID'];?>">Edytuj</a>
					<?php if($row['memberID'] != 1){?>
						&nbsp; <a class="btn btn-outline-danger btn-sm" href="javascript:deluser('<?php echo $row['memberID'];?>','<?php echo $row['username'];?>')">Usuń</a>
					<?php } ?>
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

	<p><a class="btn btn-outline-success" href='add-user.php'>Dodaj użytkownika</a></p>

</div>

</main>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
</body>
</html>
