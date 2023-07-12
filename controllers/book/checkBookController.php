<?php
session_start();
// on se connsct à la basse
require_once '../../database.php';

// on recupaire la requête
require_once '../../models/book/bookModel.php';
require_once '../../models/book/typesModel.php';



$cherche = new book;
$cherche->bookName = htmlspecialchars($_GET['resear']);
$chercheBook = $cherche->researBookList();

$typeBook = new types;
$type = $typeBook->getTypes();

require_once '../../views/includes/nav.php';
require_once '../../views/book/checkBook.php';
require_once '../../views/includes/footer.php';