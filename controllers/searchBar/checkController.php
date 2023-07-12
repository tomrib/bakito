<?php
session_start();
// on se connsct à la basse
require_once '../../../database.php';

// on recupaire la requête
require_once '../../models/book/bookModel.php';

if (count($_GET) >0){
    $getCheck = new book;
    $getCheck->bookName = htmlspecialchars($_GET['keyword']);
    $getCheckResut = $getCheck->researBookList();
}


require_once '../../views/includes/nav.php';
