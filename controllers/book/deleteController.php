<?php
session_start();
require_once '../../database.php';
require_once '../../models/book/bookModel.php';
$delete = new book;
$delete->id = $_GET['id'];
$deleteCover = $delete->getckBookListById();

$deleteBook = new book;
foreach ($deleteCover as $dc) {
    $deleteBook->id = $_GET['id'];
    if (!empty('delete')) {
        unlink('../../'.$dc->cover);
        $deleteBook->deleteBook();
        header('Location:/manga');
        exit;
    }
}