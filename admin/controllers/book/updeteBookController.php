<?php
//Vérifie si l'utilisateur est connecté et s'il a le droit d'atteindre cette page
session_start();
if (isset($_SESSION['user']['id_useradmin']) != 2) {
    header('Location:/accueil');
    exit;
}

//Requires
require_once '../../../database.php';
require_once '../../models/book/authorModels.php';
require_once '../../models/book/bookModels.php';
require_once '../../models/book/categoriesModels.php';
require_once '../../models/book/editorsModels.php';
require_once '../../models/book/languagesModels.php';
require_once '../../models/book/mangasTypesModels.php';
require_once '../../models/book/typeModels.php';
require_once '../../models/book/conditionsModels.php';
require_once '../../models/transaction.php';
require_once '../../../config.php';

//Création des variables
$formErrors = [];

//Création des objets et appel des méthodes pour les listes du formulaire
$conditions = new conditions;
$conditionsListe = $conditions->getCondition();

$author = new author;
$authorListe = $author->gitAuthor();

$categorie = new categorie;
$categorielist = $categorie->getCategorie();

$editor = new editor;
$editorlist = $editor->getEditor();

$language = new language;
$languagelist = $language->getLanguegas();

$type = new type;
$typeList = $type->getType();

$book = new book;
$book->id = $_GET['id'];
$bookid = $book->getBook();

$gettype = new mangasType;
$gettype->id_mangaBooks = $_GET['id'];
$tipeId = $gettype->getMangasTypesById();

$updetetype = new mangasType;
$updetetype->id_mangaBooks = $_GET['id'];

$addtype = new mangasType;
$addtype->id_mangaBooks = $_GET['id'];

if (count($_POST) > 0) {

    foreach ($bookid  as $bi) {

        $updeteBook = new book;
        $updeteBook->id = $_GET['id'];

        if (!empty($_POST['title'])) {
            if (!preg_match($regex['content'], $_POST['title'])) {
                $updeteBook->bookName = strip_tags($_POST['title']);
            } else {
                $formErrors['title'] = BOOK_ERROR_INVALID;
            }
        } else {
            $updeteBook->bookName = $bi->bookName;
        }

        if (!empty($_POST['numTome'])) {
            if (!preg_match($regex['tome'], $_POST['numTome'])) {
                $updeteBook->tomeNumber = strip_tags($_POST['numTome']);
            } else {
                $formErrors['numTome'] = BOOK_ERROR_TOME;
            }
        } else {
            $updeteBook->tomeNumber = $bi->tomeNumber;
        }

        if (!empty($_POST['description'])) {
            if (!preg_match($regex['content'], $_POST['description'])) {
                $updeteBook->description = strip_tags($_POST['description']);
            } else {
                $formErrors['description'] = BOOK_ERROR_INVALID;
            }
        } else {
            $updeteBook->description = $bi->description;
        }

        if (!empty($_POST['exit'])) {
            if (preg_match($regex['date'], $_POST['exit'])) {
                $updeteBook->releaseDate = strip_tags($_POST['exit']);
            } else {
                $formErrors['exit'] = BOOK_ERROR_DATE;
            }
        } else {
            $updeteBook->releaseDate = $bi->releaseDate;
        }

        if ($_FILES['image']['error'] != 4) {
            if ($_FILES['image']['error'] != 3 && $_FILES['image']['error'] != 2) {
                if ($_FILES['image']['error'] == 0) {

                    //$fileInfo = ce une varible qui contien le retour de la fonction
                    //pathinfo = retoune un tableau contenant le nom du dossiet ou et stocke le ficher le nom, extonsionet le nom santr l extension
                    $fileInfo = pathinfo($_FILES['image']['name']);
                    // !array_key_exists($fileInfo['extension'],$mime_types) = je verifi que mon extension soit dans mon tableau
                    /**  mime_content_type($_FILES['image']['name']) == $mime_types[$fileInfo['extension']]) =
                     * sa conparrele type mime réel du ficher au type mine attendu du ficher
                     * */
                    if (!array_key_exists($fileInfo['extension'], $mime_types) || mime_content_type($_FILES['image']['tmp_name']) != $mime_types[$fileInfo['extension']]) {
                        $formErrors['image'] = USER_POST_ERROR_IMAGE;
                    }
                }
            } else {
                $formErrors['image'] = USER_POST_ERROR_IMAGE;
            }
        }

        if (!empty($_POST['price'])) {
            if (preg_match($regex['price'], $_POST['price'])) {
                $updeteBook->price = strip_tags($_POST['price']);
            } else {
                // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
                $formErrors['price'] = BOOK_ERROR_PRICE;
            }
        } else {
            $updeteBook->price = $bi->price;
        }

        if (!empty($_POST['conditions'])) {
            $updeteBook->id_conditions = strip_tags($_POST['conditions']);
        } else {
            $updeteBook->id_conditions = $bi->id_conditions;
        }

        if (!empty($_POST['editor'])) {
            if ($checkEditor->checkEditor('id') !== 0) {
            $updeteBook->id_editors = strip_tags($_POST['editor']);
            } else {
                $formErrors['editor'] = BOOK_ERROR_EDITHOR;
            }
        } else {
            $updeteBook->id_editors = $bi->id_editors;
        }

        if (!empty($_POST['language'])) {
            $updeteBook->id_languages = strip_tags($_POST['language']);
        } else {
            $updeteBook->id_languages = $bi->id_languages;
        }

        if (!empty($_POST['author'])) {
            if ($author->checkauthor('id') > 0) {
            $updeteBook->id_authors = strip_tags($_POST['author']);
        } else {
            $formErrors['auteur'] = BOOK_ERROR_AUTHOR;
        }
        } else {
            $updeteBook->id_authors = $bi->id_authors;
        }

        if (!empty($_POST['categorie'])) {
            $updeteBook->id_categories = strip_tags($_POST['categorie']);
        } else {
            $updeteBook->id_categories = $bi->id_categories;
        }

        $countTypes = new mangasType;
        $countTypes->id_mangaBooks = $_GET['id'];

        $deleteType = new mangasType;
        $deleteType->id_mangaBooks = $_GET['id'];
        if (!empty($_POST['type'])) {
            if ($countTypes->countType() == 1) {
                $deleteType->deleteType();
            }
            foreach ($_POST['type'] as $t) {
                $addtype->id_types = $t;
                $typeAdd = $addtype->addMangasTypes();
            }
        }



        $path = 'assets/img/' . uniqid() . '.' . $fileInfo['extension'];
        unlink('../../../' . $bi->cover);
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../../../' . $path)) {
            chmod('../../../' . $path, '664');
            $updeteBook->cover = $path;
        }

        $updeteBook->updetebook();
    }
}

require_once '../../../views/includes/nav.php';
require_once '../../views/updeteBook.php';
require_once '../../../views/includes/footer.php';
