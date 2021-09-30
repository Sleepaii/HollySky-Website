<div class="container">
  <div class="row">
    <div class="col-lg-3">

    </div>
    <div class="col-lg-6">
      <div class="content content-padding">
        <h1 class="pagetitle">Retouvez votre mot de passe</h1>
        <hr class="left">
        <div class="clearfix">
        </div>
        <br>
        <form method="post">
          <label for="username">Pseudo</label>
          <input type="text" name="username" placeholder="Ex: Tronai" class="form-control">
          <label for="email">Email</label>
          <input type="email" name="email" placeholder="Ex contact@hollysky.fr" class="form-control">

          <div class="clearfix" style="padding:7.5px;">
          </div>
          <input type="submit" name="sendForgotPassword" value="Recevoir un email" class="btn btn-large btn-success">
          <a href="<?= (new \App\General())->getURL("login"); ?>" style="color:black;">J'ai retrouvé mon <span class="color">mot de passe</span></a>.
        </form>

      </div>
    </div>
  </div>
</div>
