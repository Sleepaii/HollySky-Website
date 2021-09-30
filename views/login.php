<div class="container">
  <div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">
      <div class="content content-padding">
        <h1 class="pagetitle">Connexion</h1>
        <hr class="left">
        <div class="clearfix">
        </div>
        <br>
        <form method="post">
          <label for="username">Pseudo</label>
          <input type="text" name="username" placeholder="Ex: Tronai" class="form-control">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control">
          <a href="<?= (new \App\General())->getURL("forgot"); ?>" class="color">J'ai oublié mon mot de passe</a>
          <div class="clearfix" style="padding:7.5px;">
          </div>
          <input type="checkbox" name="stayOnline"> Rester connecté.<br><br>
          <input type="submit" name="sendLogin" value="Connexion" class="btn btn-large btn-success">
          <a href="<?= (new \App\General())->getURL("register"); ?>" style="color:black;">Je n'ai pas de <span class="color">compte</span></a>.
        </form>

      </div>
    </div>
  </div>
</div>
