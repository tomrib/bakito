<?php
session_start();
if (isset($_SESSION['user']['id_useradmin']) != 2) { 
    header('Location:/accueil');
    exit;
}
require_once '../../../database.php';
require_once '../../models/book/bookModels.php';
$countId = new book;
$countId->countIdBook();
require_once '../../../views/includes/nav.php';
require_once '../../views/userAdmin.php';
require_once '../../../views/includes/footer.php';