<?php

  if (isset($_COOKIE['vote']) AND !empty($_COOKIE['vote'])) {

    $dateVote = htmlspecialchars($_COOKIE['vote']);

    $dateVote = new DateTime($dateVote);

    $dateVote = clone $dateVote;

    $dateVote->modify('+1 hour + 30 minutes');

    $dateVote = $dateVote->format('Y-m-d H:i:s');

  }

?>





<div class="container vote">



  <?php if (isset($_GET['p3']) AND !empty($_GET['p3'])) { ?>

    <div class="content contentBody">

      <div class="alert alert-success" id="alert">

        Veuillez <u><a href="https://serveur-prive.net/minecraft/hollysky-skyblock-evolutif-1-12-2-nouveau-8316/vote" class="color" target="_blank">voter</a></u> et attendre <b id="counter">10</b> seconde.s !

      </div>

      <div class="row hide" id="buttons">

        <div class="col-lg-6">

          <form method="post">

            <input type="submit" name="sendVote" style="margin:0px!important;" value="Récupérer ma récompense (Être connecté jeu)" class="btn btn-success btn-large">

          </form>

        </div>

        <div class="col-lg-6">

          <form method="post">

            <input type="submit" name="sendVoteLater" style="margin:0px!important;" value="Récupérer ma récompense plus tard" class="btn btn-success btn-large">

          </form>

        </div>

      </div>

      <p>Pour votez, cliquez <a href="https://serveur-prive.net/minecraft/hollysky-skyblock-evolutif-1-12-2-nouveau-8316/vote" class="color" target="_blank">ici</a>.</p>

    </div>

  <?php } else { ?>

    <div class="row">

      <div class="col-lg-9">

        <div class="content contentBody">

          <div class="row">

            <div class="col-lg-8">

              <h1>Votez et <span class="color">gagnez</span> !</h1>

            </div>

            <div class="col-lg-4">

              <?php if (isset($_COOKIE['vote']) AND !empty($_COOKIE['vote'])) { ?>

                <?php if (!$general->ifVote($_COOKIE['vote'])) { ?>

                  <div class="right">

                    <p style="color:rgb(103,103,103)">Prochain vote <?= (isset($_COOKIE['vote_username']) AND !empty($_COOKIE['vote_username'])) ? "de ".$_COOKIE['vote_username'] : "" ?>:</p>

                    <span class="badge badge-undefined right" id="date_count">...</span>

                  </div>

                  <style media="screen">

                  .badge-undefined {

                    background-color: rgba(0,0,0,.1);

                    color:#black;

                    padding-left: 10px;

                    padding-right: 10px;

                  }

                  </style>

                <?php } ?>

              <?php } ?>

            </div>

          </div>

          <hr class="left" style="width:10%">

          <div class="clearfix">

          </div>

          <br>

          <form method="post">

            <input type="text" class="form-control" name="username" placeholder="Ex: Tronai" <?= (isset($_COOKIE['vote_username']) AND !empty($_COOKIE['vote_username'])) ? "value='" . $_COOKIE['vote_username'] . "'" : "" ?>>

            <br>

            <div class="row">

              <div class="col-lg-10">

                <input type="checkbox" name="save_username" <?= (isset($_COOKIE['vote_username']) AND !empty($_COOKIE['vote_username'])) ? "checked" : "" ?>> Retenir mon pseudo ?

              </div>

              <div class="col-lg-2">

                <input type="submit" class="btn btn-success btn-large" name="checkUsername" value="Voter">

              </div>

            </div>

          </form>

        </div>

      </div>

      <div class="col-lg-3">

        <div class="content contentBody">

          <label>Vote Party</label>

          <span class="right label label-success"><?= $general->getVoteParty() ?>%</span>

          <div class="progress">

            <div class="progress-bar w-<?= round($general->getVoteParty()) ?>" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>

          </div>

        </div>

      </div>

    </div>

    <style media="screen">

    .label-success {

      border-radius: 3px;

      margin: 0px;

      color: rgba(58,171,87,1);

      background-color: rgba(58,171,87,0.3);

      font-weight: bolder;

      font-size: 13px;

      padding: 0px 5px;

      margin-top: 2.5px;

    }

    .progress {

      height: 5px;

      margin-top: 10px;

    }

    .progress-bar {

      background-color: rgba(58,171,87,1);

    }

    </style>

  <?php } ?>



  <br><br>

  <?php if(date('m') == "05") { ?>

    <div class="content contentBody">

      <div class="alert alert-danger">

        <b>Attention:</b> Le classement ne commence qu'au mois de Juin !

      </div>

    </div>

    <br><br>

  <?php } ?>

  <div class="row">

    <div class="col-lg-6">

      <div class="content contentBody">

        <h2>Classement mensuel</h2>

        <hr class="left">

        <div class="clearfix">

        </div>

        <table class="table">

          <thead>

            <td style="border-top:0px;"><b>#</b></td>

            <td style="border-top:0px;"><b>Pseudo</b></td>

            <td style="border-top:0px;"><b>Récompenses</b></td>

            <td style="border-top:0px;"><b>Votes</b></td>

          </thead>

          <?php

          $i = 0;

          $vote = (new \App\Vote())->getMonthlyRanking();

          while ($v = $vote->fetch()) { $i++

            ?>

            <tr>

              <td><?= $i ?></td>

              <td><?= $v['username'] ?></td>

              <td>

                <?php
                switch ($i) {
                  case 1:
                      echo "<span class=\"badge badge-first\">3.000 crédits</span>";
                    break;
                  case 2:
                      echo "<span class=\"badge badge-second\">2.000 crédits</span>";
                    break;
                  case 3:
                      echo "<span class=\"badge badge-third\">1.500 crédits</span>";
                    break;
                  case 4:
                      echo "<span class=\"badge\">1.000 crédits</span>";
                    break;

                  default:
                      echo "<span class=\"badge\">500 crédits</span>";
                    break;
                }
                ?>
              </td>

              <td><?= $v['nb'] ?></td>

            </tr>

          <?php } ?>

        </table>

      </div>

    </div>

    <div class="col-lg-6">

      <div class="content contentBody">

        <h2>Classement total</h2>

        <hr class="left">

        <div class="clearfix">

        </div>

        <table class="table">

          <thead>

            <td style="border-top:0px;"><b>#</b></td>

            <td style="border-top:0px;"><b>Pseudo</b></td>

            <td style="border-top:0px;"><b>Votes</b></td>

          </thead>

          <?php

          $i = 0;

          $vote = (new \App\Vote())->getAllTimeRanking();

          while ($v = $vote->fetch()) { $i++

            ?>

            <tr>

              <td><?= $i ?></td>

              <td><?= $v['username'] ?></td>

              <td><?= $v['nb'] ?></td>

            </tr>

          <?php } ?>

        </table>

      </div>

    </div>

  </div>



</div>





<?php if (isset($_COOKIE['vote']) AND !empty($_COOKIE['vote']) AND !isset($_GET['p3'])) { ?>



  <script type="text/javascript">

    function countVote() {

      var date_count = document.getElementById('date_count');

      var date_actuelle = new Date();

      var date_evenement = new Date("<?= $dateVote ?>");



      var total_secondes = (date_evenement - date_actuelle) / 1000;

      var total_secondesTwo = (date_evenement - date_actuelle) / 1000;



    if (total_secondes < 0) {

        total_secondes = Math.abs(total_secondes); // On ne garde que la valeur absolue

    }



    if (total_secondes > 0) {

        var jours = Math.floor(total_secondes / (60 * 60 * 24));

        var heures = Math.floor((total_secondes - (jours * 60 * 60 * 24)) / (60 * 60));

        minutes = Math.floor((total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60))) / 60);

        secondes = Math.floor(total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60)));



        var mot_heure = "h";

        var mot_minute = "min";

        var mot_seconde = "s";

        var et = "et";



        if (heures == 0)

        {

            heures = '';

            mot_heure = '';

        }

        else if (heures == 1)

        {

            mot_heure = "h,";

        }



        if (minutes == 0)

        {

            minutes = '';

            mot_minute = '';

            et = '';

        }

        else if (minutes == 1)

        {

            mot_minute = "min";

        }



        if (secondes == 0)

        {

            secondes = '';

            mot_seconde = '';

            et = '';

        }

        else if (secondes == 1)

        {

            mot_seconde = "s";

        }



        if (minutes == 0 && heures == 0 && jours == 0)

        {

            date_count.innerHTML = "Disponible";

        }



        date_count.innerHTML = heures + ' ' + mot_heure + ' ' + minutes + ' ' + mot_minute + ' ' + et + ' ' + secondes + ' ' + mot_seconde;

        }

        else

        {

            date_count.innerHTML = "Disponible";

        }



        if (total_secondesTwo < 1) {

          date_count.innerHTML = "Disponible";

          date_count.classList.add("label-success-count");

          date_count.classList.add("label-success");

          date_count.classList.add("label");

          clearInterval(actualisation);

        } else {

          var actualisation = setTimeout("countVote()", 1000);

        }

      }



      countVote()



  </script>

<?php } ?>

<?php if (isset($_GET['p3']) AND !empty($_GET['p3'])) { ?>

  <script language='javascript'>

    function counter() {

      var counter = document.getElementById('counter');

      var alert = document.getElementById('alert');

      var buttons = document.getElementById('buttons');

      var time = counter.innerText;

      var newTime = time - 1;

      if (newTime === -1) {

        alert.classList.toggle('hide');

        buttons.classList.toggle('hide');

        clearInterval(i);

      } else {

        counter.innerHTML = newTime;

      }

    }

    var i = setInterval("counter()", 1000);

  </script>

<?php } ?>

<style media="screen">

  .label-success-count {

    padding: 2.5px 5px;

  }

</style>

