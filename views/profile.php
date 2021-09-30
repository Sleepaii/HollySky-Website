<?php

$vote = new \App\Vote();

$shop = new \App\Shop();

$user = new \App\User();

?>

<div class="container">



  <?php if ($vote->checkWaitingRewards()) { ?>

    <div class="content content-padding">

      <div class="alert alert-success">

        Vous avez <b><?= $vote->numbersWaitingRewards() ?></b> récompenses de vote en attente.

        <form method="post">

          <input type="submit" style="border:0;margin:0;padding:0;background:none;margin-top:-22.5px;" name="sendGetLaterVote" value="Récupérer" class="color right">

        </form>

      </div>

    </div>

    <br>

  <?php } ?>



  <?php if ($shop->checkWaitingPSC($_SESSION['user']['id'])) { ?>

    <div class="content content-padding" style="margin:0px;">

      <div class="alert alert-warning">

        Vous avez une ou plusieurs PaySafeCard en attente de vérification...

      </div>

    </div>

  <?php } ?>


  <div class="content content-padding">

    <h1 class="pagetitle">Bienvenue <span class="color"><?= $_SESSION['user']['username'] ?></span> !</h1>

    <hr class="left" style="width:10%;">

    <div class="clearfix" style="padding:7.5px;">

    </div>

    <div class="row">

      <div class="col-lg-6">

        <label for="email">Email</label>

        <input type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" class="form-control" disabled>

      </div>

      <div class="col-lg-6">

        <label for="email">Inscription</label>

        <input type="email" name="email" value="<?= $_SESSION['user']['date'] ?>" class="form-control" disabled>

      </div>

    </div>

    <br>

    <div class="row">

      <div class="col-lg-9">

      </div>

      <div class="col-lg-3">

        <a href="https://hollysky.fr/api/logout/logout.php" class="btn btn-large btn-success">Déconnexion</a>

      </div>

    </div>

  </div>

  <br>

  <div class="row">

    <div class="col-lg-6">

      <div class="content content-padding">

        <h2 class="pagesubtitle">Modifier son email</h2>

        <hr class="left">

        <div class="clearfix" style="padding:7.5px;">

        </div>

        <form method="post">

          <label for="email">Email</label>

          <input type="email" name="email" placeholder="Ex: contact@hollysky.fr" class="form-control">

          <label for="emailConfirmation">Confirmation de l'email</label>

          <input type="email" name="emailConfirmation" placeholder="Ex: contact@hollysky.fr" class="form-control">

          <br>

          <input type="submit" name="sendEmailUpdate" value="Modifier" class="btn btn-large btn-success">

        </form>

      </div>

    </div>

    <div class="col-lg-6">

      <div class="content content-padding">

        <h2 class="pagesubtitle">Modifier son mot de passe</h2>

        <hr class="left">

        <div class="clearfix" style="padding:7.5px;">

        </div>

        <form method="post">

          <label for="password">Mot de passe</label>

          <input type="password" name="password" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control">

          <label for="passwordConfirmation">Confirmation du mot de passe</label>

          <input type="password" name="passwordConfirmation" placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;" class="form-control">

          <br>

          <input type="submit" name="sendPasswordUpdate" value="Modifier" class="btn btn-large btn-success">

        </form>

      </div>

    </div>

  </div>

  <br>

  <div class="content content-padding">

    <h2 class="pagesubtitle">Double authentification</h2>

    <hr class="left">

    <div class="clearfix" style="padding:7.5px;">

    </div>

    <div class="alert alert-success">

      La double authentification n'est pas encore disponible !

    </div>

  </div>

  <br>

  <div class="content content-padding">

    <h2 class="pagesubtitle">Vos achats</h2>

    <hr class="left" style="width:5%;">

    <div class="clearfix" style="padding:7.5px;">

    </div>

    <table class="table">

      <thead>

        <td style="border-top:0;"><b>#</b></td>

        <td style="border-top:0;"><b>Article</b></td>

        <td style="border-top:0;"><b>Prix</b></td>

        <td style="border-top:0;"><b>Status</b></td>

        <td style="border-top:0;"><b>Date</b></td>

      </thead>

      <?php

      $lastBuy = $shop->getLastBuy($_SESSION['user']['id']);

      while ($l = $lastBuy->fetch()) { ?>

        <tr>

          <td><?= $l['id'] ?></td>

          <td><?php

          $req = $db->request("SELECT * FROM shop_articles WHERE id = ?", [$l['article_id']]);

          $r = $req->fetch();

          echo $r['title'];

          ?></td>

          <td><?= $l['article_price'] ?> €</td>

          <td><?php

          switch ($l['status']) {

            case "0":

              echo "<span class='badge badge-warning'>Non reçu</span>";

              break;

            case "1":

              echo "<span class='badge badge-online'>Reçu</span>";

              break;

            case "2":

              echo "<span class='badge badge-online'>Reçu</span>";

              break;

            default:

              echo "<span class='badge badge-danger'>Indisponible</span>";

              break;

          }

           ?></td>

          <td><?= $l['date'] ?></td>

        </tr>

      <?php } ?>

    </table>

  </div>

  <br>

  <div class="content content-padding">

    <h2 class="pagesubtitle">Vos derniers votes</h2>

    <hr class="left" style="width:5%;">

    <div class="clearfix" style="padding:7.5px;">

    </div>



    <table class="table">

      <thead>

        <td style="border-top:0;"><b>#</b></td>

        <td style="border-top:0;"><b>Date</b></td>

        <td style="border-top:0;"><b>Site</b></td>

        <td style="border-top:0;"><b>Récompense</b></td>

      </thead>



      <?php $vv = $vote->getLastVotes($_SESSION['user']['username']);

      while ($v = $vv->fetch()) { ?>

        <tr>

          <td><?= $v['id'] ?></td>

          <td><?= $v['date'] ?></td>

          <td>

            <?php

            switch ($v['website']) {

              case 'sp':

                echo "<span class='badge badge-sp'>Serveur privé</span>";

                break;



              default:

                echo "<span class='badge badge-danger'>Indisponible</span>";

                break;

            }

            ?>

          </td>

          <td>

            <?php

            switch ($v['rewards']) {

              case "0":

                echo "<span class='badge badge-warning'>En attente..</span>";

                break;

              case "1":

                echo "<span class='badge badge-online'>Reçu</span>";

                break;

              case "2":

                echo "<span class='badge badge-online'>Reçu</span>";

                break;

              default:

                echo "<span class='badge badge-danger'>Indisponible</span>";

                break;

            }

            ?>

          </td>

        </tr>

      <?php } ?>



    </table>

  </div>

  <style media="screen">

  .badge-sp {

    color:#fc3754;

    background-color:rgba(252,56,85,.3);

    border:#fc3754 1px solid;

    border-radius: 10px;

    padding-left: 10px;

    padding-right: 10px;

  }

  .badge-warn, .badge-warning {

    color:rgba(255,195,0,1);

    background-color:rgba(255,195,0,.3);

    border:rgba(255,195,0,1) 1px solid;

    border-radius: 10px;

    padding-left: 10px;

    padding-right: 10px;

  }

  </style>

</div>

