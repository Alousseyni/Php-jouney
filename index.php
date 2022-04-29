<?php
session_start();
$_SESSION["user"]="admin";
$title="page d'accueil";
 require("elements/header.php"); 
 ?>
  <!-- <pre>
  <?php print_r($_SERVER);?>
  </pre> -->
  <?php require("elements/footer.php"); ?>
