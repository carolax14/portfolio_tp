<?php

if (isset($_POST['envoyer'])) {

  $retour = mail('carole.hafizou@gmail.com', 'Envoi depuis la page Contact', $_POST['message'], 'De: ' . $_POST['email']);
  if ($retour)
    echo '<p>Votre message a été envoyé.</p>';
  else
    echo '<p>Erreur.</p>';
}
