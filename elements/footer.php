<hr>
<?php require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'functions'.DIRECTORY_SEPARATOR.'compteur.php';?> 
<div class="row">
            <div class="col-md-4">
                  <?php ajouter_vues() ; ?>
                  <h5>il y'a <?=nombre_vues()?> nombre<?php if((int)nombre_vues()>1):?>s <?php endif ;?> de vues</h5>
            </div>
<div class="col-md-8">
<div class="bg-light p-5 rounded">
    <h1>Navbar example</h1>
    <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser’s viewport.</p>
    <a class="btn btn-lg btn-primary" href="/docs/5.1/components/navbar/" role="button">View navbar docs &raquo;</a>
  </div>
</main>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
      
  </body>
</html>