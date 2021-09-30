<?php

  if (!isset($_GET['p3'])) {
    header("Location: https://hollysky.fr");
  }

?>
<div class="container">
  <div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">
      <div class="content content-padding">
        <h1 class="pagetitle">Modifier votre mot de passe</h1>
        <hr class="left">
        <div class="clearfix">
        </div>
        <br>
        <form method="post">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Ex: contact@hollysky.fr" class="form-control" required>
          <label for="password">Mot de passe</label>
          <input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control" required>
          <label for="password_confirm">Confirmation du mot de passe</label>
          <input type="password" name="password_confirm" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control" required>
          <input type="text" name="key" value="<?= $_GET['p3'] ?>" style="opacity:0;width:1px;height:1px;">
          <div class="clearfix" style="padding:7.5px;">
          </div>
          <input type="submit" name="sendEditForgotPassword" value="Modifier" class="btn btn-large btn-success">
        </form>

      </div>
    </div>
  </div>
</div>
