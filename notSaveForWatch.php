<?php 
$age=null;
if (!empty($_POST['birthday'])) {
  setcookie("user" ,  $_POST['birthday']);
  $_COOKIE['user']=$_GET["birthday"];
 }
if (!empty($_COOKIE['user'])) {
  $age=(int)date('Y') - (int)$_COOKIE['user'];
}
require "elements/header.php" ; ?>
<!-- -------------------------------------------- -->
<?php if($age >=18): ?>
      <h2>You can access to the contents</h2>
<?php elseif($age !== null): ?>
    <div class="alert alert-danger">You can not access </div>
<?php else: ?>
    <div class="form-group">
    <form action="" method="post">
    <label for="birthday">Only for adult,supply your  birth year</label>
    <select name="birthday" id="birthday"  class="form-control">
        <?php for ($i=2010; $i >1919 ; $i--) : ?>
          <option value="<?=$i ?>"><?= $i ?></option>
        <?php endfor ?>
    </select>
    <button type="submit" class="btn btn-primary">submit</button>
    </form>
    </div>
<?php endif ?>
<!-- -------------------------------------------- -->
<?php require "elements/footer.php"; ?>