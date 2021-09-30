<?php
/** Lancement des notificiations */
if (isset($_SESSION['notification']['type']) AND isset($_SESSION['notification']['message'])) {
  (new \App\Notification())->sendNotification($_SESSION['notification']['message'], $_SESSION['notification']['type']);
}
