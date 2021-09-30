<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="google" content="notranslate">
    <meta name="robots" content="follow, index, all">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <link rel="icon" href="<?= (new \App\General())->getURL("views/default/webroot/img/logo.png"); ?>">
    <title>Hollysky - Skyblock Français</title>

    <meta name="theme-color" content="#3aab57">
    <meta name="og:type" content="website">
    <meta name="og:title" content="Hollysky - Skyblock Français">
    <meta name="og:url" content="https://hollysky.fr/">
    <meta name="og:image" content="https://hollysky.fr/views/default/webroot/img/logo.png">
    <meta name="og:description" content="Découvrez, explorez, développez votre île et accomplissez de nombreux défis pour devenir le meilleur du serveur ! N'attendez plus, rejoignez-nous sur le serveur en 1.12.2 sur play.hollysky.fr !">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://hollysky.fr/views/default/webroot/css/hollysky.css">
    <link rel="stylesheet" href="https://hollysky.fr/views/default/webroot/css/animation.css">
    <link rel="stylesheet" href="https://hollysky.fr/views/default/webroot/css/phone.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <!-- WARNING : N'activer que quand notif ? -->
    <script type="text/javascript" src="https://hollysky.fr/views/default/webroot/js/notify.min.js"></script>
    <script type="text/javascript" src="https://hollysky.fr/views/default/webroot/js/notify.design.js"></script>
    <!-- END WARNING -->


  </head>
  <body>


    <?php if (isset($_COOKIE['vote']) AND !empty($_COOKIE['vote'])) { ?>
      <?php if ($general->ifVote($_COOKIE['vote'])) { ?>
        <div class="alert alert-vote">
          <div class="container">
            Vous pouvez voter et récupérer une récompenses dès maintenant !
            <a href="https://hollysky.fr/vote" class="right">Voter</a>
          </div>
        </div>
      <?php } ?>
    <?php } ?>


    <div id="heading">
      <div class="filter">
        <div class="container">
            <nav class="navbar navbar-expand-lg phone-hide">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                    <a class="nav-link nav-active" href="<?= (new \App\General())->getURL("/"); ?>">Accueil</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= (new \App\General())->getURL("vote"); ?>">Vote</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="https://discord.gg/N3urX9ttvs">Support</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?= (new \App\General())->getURL("history"); ?>">Histoire</a>
                  </li>
                  <?php if (isset($_SESSION['user']['id'])) { ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= (new \App\General())->getURL("profile"); ?>">
                        Mon profil
                        <?php $vote = new \App\Vote();
                        if ($vote->checkWaitingRewards()) { $nvote = $vote->numbersWaitingRewards() ;?><span class="notificationprofile"><?= ($nvote > 8) ? "9+" : $nvote; ?></span><?php } ?>
                      </a>
                    </li>
                  <?php } else { ?>
                    <li class="nav-item">
                      <a class="nav-link" href="<?= (new \App\General())->getURL("login"); ?>">Connexion</a>
                    </li>
                  <?php } ?>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                  <a href="<?= (new \App\General())->getURL("shop"); ?>" class="btnShop my-2 my-sm-0" type="submit">Boutique</a>
                </div>
              </div>
            </nav>

            <div class="computer-hide phone-menu">
              <div class="row">
                <div class="col-6">
                  <h1 class="pagetitle white">Hollysky</h1>
                </div>
                <div class="col-6">
                  <div class="dropdown right">
                    <button type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                      <a class="dropdown-item" href="<?= (new \App\General())->getURL("/"); ?>">Accueil</a>
                      <a class="dropdown-item" href="<?= (new \App\General())->getURL("/shop"); ?>">Boutique</a>
                      <a class="dropdown-item" href="<?= (new \App\General())->getURL("/vote"); ?>">Vote</a>
                      <?php if (isset($_SESSION['user']['id'])) { ?>
                        <a class="dropdown-item" href="<?= (new \App\General())->getURL("/profile"); ?>">Mon profil</a>
                      <?php } else { ?>
                        <a class="dropdown-item" href="<?= (new \App\General())->getURL("/login"); ?>">Connexion</a>
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
              <br><br><br>
            </div>
          <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
              <div class="computer-hide" style="padding:25px;">

              </div>
              <center>
                <img src="<?= (new \App\General())->getURL("views/default/webroot/img/logo.png"); ?>" class="headinglogo" alt="">
              </center>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div id="belowHeader" class="phone-hide">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="infoBar">
                <span class="ipBar">play.hollysky.fr</span><br>
                <span class="badge badge-online"><span id="onlinePlayers">0</span> en ligne</span>
              </div>
            </div>
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
              <div class="infoBar">
                <span class="ipBar right">Joueurs uniques</span><br>
                <span class="badge badge-online right"><?= $general->getNumberUsers() ?> inscrits</span>
              </div>
            </div>
          </div>
        </div>
    </div>
    <div class="computer-hide">
      <div class="bar">
      </div>
    </div>
