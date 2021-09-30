<div class="container">
  <div class="row">
    <div class="col-lg-9">
      <?php
      $news = $general->getLastNews();
        while ($n = $news->fetch()) {
          ?>
          <div class="content news">
            <div class="row">
              <div class="col-lg-10">
                <h3><?= $n['title'] ?></h3>
              </div>
              <div class="col-lg-2">
                <span class="badge badge-online" style="margin-top:5px;"><?= $n['categorie'] ?></span>
              </div>
            </div>
            <p style="text-align:justify;">
              <?= $n['content'] ?>
            </p>
            <p class="sign">L'équipe d'Hollysky,</p>
          </div>
          <br>
      <?php } ?>
    </div>
    <div class="col-lg-3">

      <div class="content contentLogin">
        <div class="filterLogin">
          <div class="filterLoginToRight">
            <h2>Espace membre</h2>
            <hr>


            <?php if (isset($_SESSION['user']['id'])) { ?>
              <form method="post">
                <a href="profile" class="btn btn-success btn-large" style="margin-bottom:20px;margin-top:20px;">Mon profil</a>
                <input type="submit" name="sendLogout" value="Déconnexion" class="btn btn-success btn-large">
                <?php if ($_SESSION['user']['access'] == 3) { ?>
                  <a href="admin" class="btn btn-success btn-large" style="margin-bottom:20px;margin-top:20px;">Panel Admin</a>
                <?php } ?>
              </form>
            <?php } else { ?>
              <form method="post">
                <label for="username">Pseudo</label>
                <input type="text" name="username" placeholder="Ex: Tronai" class="form-control">

                <label for="username">Mot de passe <a href="<?= (new \App\General())->getURL("forgot"); ?>" class="color">oublié ?</a></label>
                <input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control" style="margin-bottom:10px;">

                <input type="checkbox" name="stayOnline" style="margin-bottom:10px;"> Rester connecté ?

                <input type="submit" name="sendLogin" value="Connexion" class="btn btn-success btn-large">
                <a href="<?= (new \App\General())->getURL("register"); ?>" style="color:black;">Je n'ai pas de <span class="color">compte</span></a>.
              </form>
            <?php } ?>
          </div>
        </div>
      </div>

      <div class="content">
        <a href="https://discord.gg/N3urX9ttvs" target="_blank">
          <div class="discordBtn">
            <div class="filterDiscordBtn">
              <div class="row">
                <div class="col-lg-3 col-2">
                  <img src="https://discord.com/assets/1c8a54f25d101bdc607cec7228247a9a.svg" alt="">
                </div>
                <div class="col-lg-9 col-10">
                  <h4 class="DiscordBtnH4">Notre discord</h4>
                  <span class="numberDiscordBtn">+ 1.800 membres</span>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="content">
        <a href="https://twitter.com/HollySky_FR" target="_blank">
          <div class="discordBtn">
            <div class="filterTwitterBtn">
              <div class="row">
                <div class="col-lg-3 col-2">
                  <i class="fab fa-twitter" style="color:white;font-size:32.5px;text-align:center;"></i>
                </div>
                <div class="col-lg-9 col-10">
                  <h4 class="DiscordBtnH4">Notre twitter</h4>
                  <span class="numberDiscordBtn">@HollySky_FR</span>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

      <div class="content">
        <a href="https://vm.tiktok.com/ZMeWdpFQN/" target="_blank">
          <div class="tiktokBtn">
            <div class="filterTiktokBtn">
              <div class="row">
                <div class="col-lg-3 col-2">
                  <img src="https://cdn.discordapp.com/attachments/602218762426384384/845786272688635954/Tiktok_blanc.png" width="100%">
                </div>
                <div class="col-lg-9 col-10">
                  <h4 class="DiscordBtnH4">Notre tiktok</h4>
                  <span class="numberDiscordBtn">@HollySky_FR</span>
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>
</div>
