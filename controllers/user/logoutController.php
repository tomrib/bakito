<?php
//TODO session-start / me perme de reste avec ma connexion user
session_start();
//TODO  unset / Détruit une variable con donne en fention
unset($_SESSION);
//TODO session_destroy / detuit tout les donne d une connexion active
session_destroy();
//TODO header('Location:/accueil') / revois vere la page une foit le script fin
header('Location:/accueil');