  <div id="footer">
    <a href="<?= (new \App\General())->getURL("vote"); ?>">
      <div class="vote">
        <div class="voteFilter">
          <h3>Votez pour le serveur et recevez des récompenses uniques !</h3>
        </div>
      </div>
    </a>
    <div class="top">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h2>HollySky</h2>
            <hr style="float:left;">
            <div class="clearfix">
            </div>
            <p>
              Découvrez, explorez, développez votre île et accomplissez de nombreux défis pour devenir le meilleur du serveur !
              N'attendez plus, rejoignez-nous sur le serveur !
              </p>

            <span id="tocopy" style="opacity:0;font-size:1px;">play.hollysky.fr</span>
            <input type="button" value="play.hollysky.fr" class="js-copy ip" data-target="#tocopy">
          </div>
          <div class="col-lg-4">

          </div>
          <div class="col-lg-4">
            <center>
              <img src="<?= (new \App\General())->getURL("views/default/webroot/img/logo.png"); ?>" width="60%" class="imgBlackWhite" alt="">
            </center>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom">
      <div class="container">
        <span class="copyrightTop">Copyright &copy; <?= date("Y") ?> HollySky. Tous droits reservés.</span> <br>
        <span class="copyrightBottom">Développé par <a href="https://twitter.com/Tronaidev">Tronai</a>.</span>
      </div>
    </div>
  </div>
  </body>

  <script src="https://mcapi.us/scripts/minecraft.js"></script>
  <script src="https://hollysky.fr/views/default/webroot/js/custom.js"></script>
  <script>
    MinecraftAPI.getServerStatus('play.hollysky.fr', {
      port: 25565 // optional, only if you need a custom port
    }, function (err, status) {
      if (err) {
        return document.getElementById('onlinePlayers').innerHTML = 'NaN';
      }

      // you can change these to your own message!
      document.getElementById('onlinePlayers').innerHTML = status.players.now;
    });
  </script>
</html>
