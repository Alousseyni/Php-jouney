<?php
if (session_start()==PHP_SESSION_NONE) {
  session_start();
}
function nav_tools(string $lien,string $titre):string
{
    $classe="nav-link ";
    if ($_SERVER['SCRIPT_NAME']===$lien) 
    {
      $classe.=$classe."active";
    }
    $html='  <li class="nav-item">
                            <a class="'. $classe.'" href="'. $lien.'" aria-current="page" >'.$titre.'</a>
                    </li>';
                    echo $html;
return $html;
}
require_once "functions/auth.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>
        <?php if (isset($title)):?>
        <?php echo $title;?>
        <?php else:?> 
                    Mon site
         <?php endif ?>
   </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/navbar-fixed/">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark mb-4 bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Mon site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
      <?php nav_tools("/index.php","accueil");?>
      <?php nav_tools("/contact.php","contact");?>
      <!-- <?php //nav_tools("/blog.php","Blog"); ?> -->
        <!-- <li class="nav-item">
          <a class="nav-link <?php //if($_SERVER['SCRIPT_NAME']=== '/index.php'):?>active<?php //endif?>" aria-current="page" href="/index.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php //if($_SERVER['SCRIPT_NAME'] === '/contact.php'):?> active <?php //endif ?>" href="/contact.php" >Contact</a>
        </li> -->
      </ul>
      <?php if(est_connecter()): ?>
      <ul class="navbar-nav"><a href="/logout.php" class="nav-link">Se deconnecter</a></ul>
      <?php endif?>
    </div>
  </div>
</nav>

<main class="container">