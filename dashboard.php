<?php 
require_once "functions/auth.php";
forcer_a_se_connecter();
require "elements/header.php";
require_once "functions/compteur.php";
$annee_courant=(int)date('Y');
$mois_courant=(int)date('m');
$annee_selectionner=empty($_GET['anneeSelect']) ? null: (int)$_GET['anneeSelect'];
$mois_selectionner=empty($_GET['mois']) ? null: (int)$_GET['mois'];
$details=null;
if ($mois_selectionner && $annee_selectionner) {
  $total=nombre_vues_mois($annee_selectionner,$mois_selectionner); 
  $details=nombre_vues_detailler_mois($annee_selectionner,$mois_selectionner);
}else{
  $total=nombre_vues();
}

$mois=[
  '01'=>'Janvier',
  '02'=>'Fevrier',
  '03'=>'Mars',
  '04'=>'Avril',
  '05'=>'Mai',
  '06'=>'Juin',
  '07'=>'Juillet',
  '08'=>'Aout',
  '09'=>'Septembre',
  '10'=>'Octobre',
  '11'=>'Novembre',
  '12'=>'Decembre'
];
?>

<div class="row">
      <div class="col-md-4">
                    <div class="list-group">
                        <?php for($i=0; $i<5; $i++) :?>
                             <a class="list-group-item<?= ($annee_courant -$i === $annee_selectionner )?' active':''?>" href="dashboard.php?anneeSelect=<?=       ($annee_courant-$i) ?>"><?=($annee_courant-$i) ?>
                              </a>
                              <?php if(($annee_courant - $i)== $annee_selectionner) :?>
                                   <div class="list-group">
                                          <?php foreach($mois as $j => $value): ?>
                                                    <a class="list-group-item <?=($mois_selectionner===$j) ?'active':'' ?>" href="dashboard.php?anneeSelect=<?=$annee_selectionner?>&mois=<?= $j ?>">
                                                    <?= $value ?></a>
                                          <?php endforeach ?>
                                   </div>
                              <?php endif ?>
                        <?php endfor ?>
                    </div>
      </div>

      <div class="col-md-8">
              <div class="card">
                      <div class="card-body">
                            <strong style="font-size: 3em;"><?= $total ?></strong><br>
                            Visite<?=($total >1)?'s':'' ?> total.
                      </div>
              </div>
              <div>
                        <h2>Le nombre de visite plus en detaille:</h2>
                        <table class="table table-striped">
                                <thead>
                                                <tr>
                                                        <th>Jour</th>
                                                        <th>Mois</th>
                                                        <th>Année</th>
                                                        <th>Nombre de visites</th>
                                                </tr>
                                </thead>
                              <tbody>
                                        <?php if($details): ?>
                                            <?php foreach($details as $detail): ?>
                                                        <tr>
                                                                <td><?=$detail['jour'] ?></td>
                                                                <td><?=$detail['mois']?></td>
                                                                <td><?=$detail['annee']?></td>
                                                                <td><?=$detail['visites']?></td>
                                                        </tr>
                                              <?php endforeach ?>
                                              <?php endif ?>
                              </tbody>
                        </table>
              </div>
      </div>
</div>




<?php require "elements/footer.php"; ?>