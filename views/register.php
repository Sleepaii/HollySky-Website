<div class="container">
  <div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">
      <div class="content content-padding">
        <h1 class="pagetitle">Inscription</h1>
        <hr class="left">
        <div class="clearfix">
        </div>
        <br>
        <form method="post">
          <label for="username">Pseudo</label>
          <input type="text" name="username" placeholder="Ex: Tronai" class="form-control">
          <label for="email">Email</label>
          <input type="text" name="email" placeholder="Ex: contact@hollysky.fr" class="form-control">
          <label for="password">Mot de passe</label>
          <input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control">
          <label for="password">Confirmation du mot de passe</label>
          <input type="password" name="password_confirm" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control">
          <div class="clearfix" style="padding:7.5px;">
          </div>
          <input type="checkbox" name="check"> J'accepte les <a href="<?= (new \App\General())->getURL("cgu"); ?>" class="color">CGU</a>.<br><br>
          <input type="submit" name="sendRegister" value="Inscription" class="btn btn-large btn-success">
        </form>

      </div>
    </div>
  </div>
</div>
