<?php
session_start();
require_once '../../database.php';

require_once '../../models/book/bookModel.php';
require_once '../../models/book/typesModel.php';

$type = new types;
$typeOne = $type->getTypes();

$checkBook = new book;
$checkBook->id = $_GET['id'];
$cherckBookList = $checkBook->getckBookListById();



require_once '../../views/includes/nav.php';
require_once '../../views/book/oneBook.php';
require_once '../../views/includes/footer.php';