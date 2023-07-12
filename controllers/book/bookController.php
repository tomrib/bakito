<?php
session_start();
// on se connsct à la basse
require_once '../../database.php';

// on recupaire la requête
require_once '../../models/book/bookModel.php';
require_once '../../models/book/typesModel.php';



$cherche = new book;
if (count($_GET) > 0) {
    $cherche->bookName = $_GET['resear'];
}
$chercheBook = $cherche->researBookList();


$book = new book;
$bookList = $book->getBookList();

$typeBook = new types;
$type = $typeBook->getTypes();


require_once '../../views/includes/nav.php';
require_once '../../views/book/book.php';
require_once '../../views/includes/footer.php';