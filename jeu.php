<?php require 'elements/header.php';?>
<?php require 'fonction.php';?>
<?php
//checkbox
$parfums=[
  'fraise'=>4,
  'chocolat'=>5,
  'vanille'=>3
];
// radio
$cornets=[
  'pot' => 2,
  'cornet'=>3
];
//checkbox
$supplements=[
  'pépite de chocolat'=>1,
  'chantilly'=>0.5
];
$ingredients=[];
$total=0;
// Pour les parfums
if (isset($_GET['parfum'])) 
{
  foreach ($_GET['parfum'] as $parfum) 
  {
    if (isset($parfums[$parfum])) 
    {
     $ingredients[]=$parfum;
      $total += $parfums[$parfum];
// print '<pre>';
// print_r($ingredients) ; 
// print '</pre>';
    }
  }
}
// poru les supplement
if (isset($_GET['supplement']))
{
  foreach ($_GET['supplement'] as $supplement ) 
  {
      if (isset($supplements[$supplement])) 
      {
        $ingredients[] =$supplement;
        $total +=$supplements[$supplement];
// print '<pre>';
// print_r($ingredients) ; 
// print '</pre>';
      }
  }
}
// pour les cornets
if (isset($_GET['cornet']))
{
    $cornet=$_GET['cornet'];
    if (isset($cornets[$cornet]))
    {
      $ingredients[] =$cornet;
        $total +=$cornets[$cornet]; 
// print '<pre>';
// print_r($ingredients) ; 
// print '</pre>';
    }
}
?>
<h1> Composer votre Glass </h1>
<!-- ------------------------------------- -->
<h2> choississez vos parfum</h2>
<div class="row">
    <div class="col-md-4">
      <div class="card">
          <div class="card-body">
          <div class="card-title">
          <h5>Votre Glace</h5>
          <ul>
            <?php foreach($ingredients as $ingredient ): ?>
                <li><?= $ingredient ?></li>
            <?php endforeach; ?>
          </ul>
          <p>
          <strong>Prix:</strong><?= $total ?>€
          </p>
          </div>
          </div>
      </div>
    </div>
    <div class="col-md-8">
    <form action="/jeu.php" method="GET">
          <?php  foreach($parfums as $parfum => $prix): ?>
          <div>
              <label>
              <?= checkbox("parfum",$parfum,$_GET) ?>
                  <?= $parfum ?>-<?= $prix ?>€
              </label>
          </div>
          <?php endforeach ?>
          <!-- --------------------------------------- -->
          <h2> choississez votre cornet</h2>
          <?php foreach($cornets as $cornet =>$prix): ?>
            <div>
            <label >
            <?= radio("cornet",$cornet,$_GET); ?>
            <?= $cornet ?> <?= $prix ?>€
            </label>
            </div>
          <?php endforeach ?>
          <!-- ----------------------------------- -->
          <h2> choississez vos supplement</h2>
          <form action="/jeu.php" method="GET">
          <?php  foreach($supplements as $supplement => $prix): ?>
          <div>
              <label>
              <?= checkbox("supplement",$supplement,$_GET) ?>
                  <?= $supplement ?>-<?= $prix ?>€
              </label>
          </div>
          <?php endforeach ?>
          <button class="btn btn-primary" type="submit"> Composer</button>
    </form>
</div>
</div>
<hr>
<h2> POST </h2>
<pre>
<?php print_r($_POST) ; ?>
</pre>
<h2> GET </h2>
<pre>
<?php var_dump($_GET) ; ?>
</pre>
<?php require("elements/footer.php");?>