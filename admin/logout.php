<?php
//include config
require_once('../includes/config.php');

// wyloguj
$user->logout();
header('Location: index.php');

?>
