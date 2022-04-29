<?php  
    require "elements/header.php";
    require_once "fonction.php";
    require_once "data/config.php";

      date_default_timezone_set('Africa/Algiers');
    // recuperer l'heure actuel
    $heure=(int)($_GET["heure"] ?? date('G') );
    // recuperer le creneaux d'aujourd'hui
    $jours=((int)( $_GET["jour"] ?? date('N')-1) );
    // recuperer l'etat du restaurant
    $isOpen=in_creneaux($heure,CRENEAUX[$jours]);
      $color=$isOpen ? "green":"red";
?>

<div class="row">
            <div class="col-md-8">
                        <h2>Welcome to my contact page</h2>
                        <p>
                              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo accusantium deserunt excepturi magnam eaque? Eius, reiciendis. Libero reiciendis aperiam deserunt voluptates praesentium non tempora saepe suscipit itaque, corporis magni. Illum?
                              Doloremque totam nulla temporibus nesciunt aperiam sequi accusamus rerum dolores unde id, saepe veritatis dolor, sit voluptatem nisi harum perspiciatis facere voluptatibus et maxime rem non deleniti ipsam excepturi! Reprehenderit.
                              Eligendi ea laboriosam temporibus ex molestiae maxime natus ab laborum officiis dolorem consectetur, rem placeat qui ipsum libero accusamus itaque quae? Porro quae optio maiores corporis, earum obcaecati? Earum, architecto?
                              Cupiditate cum debitis quam harum, vero architecto. Sequi quasi saepe qui iste ea laudantium atque suscipit voluptatibus sint. Delectus quasi mollitia aliquam sint commodi? Magnam, consequatur debitis? Maxime, ab unde.
                              Voluptatem beatae quo aliquid assumenda ipsam iusto sit eum quia, porro sunt consectetur? Et possimus rerum eveniet molestiae a dolor, tenetur magni facere cupiditate expedita nemo atque similique sint quaerat?
                        </p>
            </div>
            <div class="col-md-4">
                         <h2>Horaire d'ouverture</h2>
                         <form action="">
                                    <div class="form-group">
                                                <select name="jour" class="form-control">
                                                                  <?php afficher(($jours)) ;?>
                                                              <?= select_day("jour",$jour,JOURS) ?>
                                                </select>
                                    </div>
                                    <div class="form-group">
                                                  <input type="number" name="heure" class="form-control" placeholder="heure  de reservation...." value="<?= $heure ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                         </form>
                         <?php if($isOpen) : ?>
                               <div class="alert alert-success">Le restaurant sera ouvert</div>
                         <?php else: ?>
                               <div class="alert alert-danger">Le restaurant sera fermé</div>
                         <?php endif ?>
                         <div class="form-group">
                                    <ul>
                                             <?php foreach(JOURS as $key => $jour ):?>
                                                       <li <?php if(($key == $jours) && $isOpen) :?> style="color:<?= $color?>"<?php endif ?>><?= $jour ?>:<?= creneaux_html(CRENEAUX[$key]) ?></li>
                                            <?php endforeach ?>
                                    </ul>
                         </div>
             </div>

</div>

<?php require "elements/footer.php"; ?>