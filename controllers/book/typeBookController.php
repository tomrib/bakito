<?php
session_start();
// on se connsct à la basse
require_once '../../database.php';

// on recupaire la requête
require_once '../../models/book/bookModel.php';
require_once '../../models/book/typesModel.php';


$bookId = new book;
$bookId->id = $_GET['id'];
$bookList = $bookId->typeBook();


$typeBook = new types;
$type = $typeBook->getTypes();

require_once '../../views/includes/nav.php';
require_once '../../views/book/typeBook.php';
require_once '../../views/includes/footer.php';