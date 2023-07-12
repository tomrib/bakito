<?php
session_start();
require_once 'database.php';
require_once 'models/book/bookModel.php';

$book = new book;
$booksList = $book->getBooks();