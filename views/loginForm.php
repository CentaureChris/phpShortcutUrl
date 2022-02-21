<?php 
require_once('./views/header.php');
require_once('./views/navbar.php') ;
// var_dump($_POST);
?>

<div class="container">
  <h1>Login Form</h1>
  <form class="col-4 offset-4" method="POST">

    <div class="mb-3">
      <label for="login" class="form-label">Login</label>
      <input type="text" class="form-control" id="login" name="login">
    </div>

    <div class="mb-3">
      <label for="pass" class="form-label">Password</label>
      <input type="password" class="form-control" id="pass" name="pass">
        </br>

        </br>
      <a href="index.php?page=register">Click here to register.</a>
        </br>
    </div>
    <input type="submit" name="submit" class="btn btn-primary" />
  </form>
</div>
<?php require_once('./views/footer.php') ?>
