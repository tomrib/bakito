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
$author = new author;
$categorie = new categorie;
$editor = new editor;
$checkEditor = new editor;
$language = new language;
$type = new type;
$book = new book;
$tran = new transaction;
if (count($_POST) > 0) {
    // Vérifie si le bouton "addNewBook" a été cliqué
    if (isset($_POST['addNewBook'])) {
        // Vérifie le champ "title"
        if (!empty($_POST['title'])) {
            // Vérifie si le titre ne contient pas de <script> dans la seci
            if (!preg_match($regex['content'], $_POST['title'])) {
                // Affecte la valeur du champ "title" à la propriété "bookName" de l'objet "book"
                $book->bookName = strip_tags($_POST['title']);
            } else {
                // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
                $formErrors['title'] = BOOK_ERROR_INVALID;
            }
        } else {
            // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
            $formErrors['title'] = BOOK_ERROR;
        }

        // Vérifie le champ "numTome"
        if (!empty($_POST['tomeNumber'])) {
            // Vérifie si le numéro de tome correspond à un format valide
            if (preg_match($regex['tome'], $_POST['tomeNumber'])) {
                // Affecte la valeur du champ "numTome" à la propriété "tomeNumber" de l'objet "book"
                $book->tomeNumber = strip_tags($_POST['tomeNumber']);
            } else {
                // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
                $formErrors['tomeNumber'] = BOOK_ERROR_TOME;
            }
        } else {
            // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
            $formErrors['tomeNumber'] = BOOK_ERROR;
        }

        // Vérifie le champ "description"
        if (!empty($_POST['description'])) {
            // Vérifie si la description ne contient pas de caractères spéciaux
            if (!preg_match($regex['content'], $_POST['description'])) {
                // Affecte la valeur du champ "description" à la propriété "description" de l'objet "book"
                $book->description = strip_tags($_POST["description"]);
            } else {
                // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
                $formErrors['description'] = BOOK_ERROR_INVALID;
            }
        } else {
            // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
            $formErrors['description'] = BOOK_ERROR;
        }

        if (!empty($_POST['exit'])) {
            if (preg_match($regex['date'], $_POST['exit'])) {

                $book->releaseDate = $_POST['exit'];
            } else {
                $formErrors['exit'] = BOOK_ERROR_DATE;
            }
        } else {
            $formErrors['exit'] = BOOK_ERROR;
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

        // Vérifie si la variable POST "price" n'est pas vide
        if (!empty($_POST['price'])) {
            // Vérifie si la valeur de la variable POST "price" correspond à un format de prix valide
            if (preg_match($regex['price'], $_POST['price'])) {
                // Affecte la valeur de la variable POST "price" à la propriété "price" de l'objet "book"
                $book->price = $_POST['price'];
            } else {
                // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
                $formErrors['exit'] = BOOK_ERROR_PRICE;
            }
        } else {
            // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
            $formErrors['exit'] = BOOK_ERROR;
        }

        // Vérifie si la variable POST "author" n'est pas vide
        if (!empty($_POST['author'])) {
            if ($_POST['author'] != 'inputAuthor' && $_POST['author'] != ' ') {
                if ($author->checkauthor('id') > 0) {
                    $book->id_authors = strip_tags($_POST['author']);
                } else {
                    $formErrors['auteur'] = BOOK_ERROR_AUTHOR;
                }
            } else {
                //verifier l'input de l'ajout d'auteur
                $author->authorsName = strip_tags($_POST['addAuthor']);
            }
        } else {
            // Ajoute un message d'erreur au tableau d'erreurs "formErrors"
            $formErrors['author'] = BOOK_ERROR;
        }

        if (!empty($_POST['categorie'])) {
            if ($categorie->checkCategories('id') > 0) {
                $book->id_categories = strip_tags($_POST['categorie']);
            } else {
                $formErrors['categorie'] = 'les bonne nes son passe passer';
            }
        } else {
            $formErrors['categorie'] = BOOK_ERROR;
        }

        if (!empty($_POST['editor'])) {
            if ($checkEditor->checkEditor('id') > 0) {
                $book->id_editors = strip_tags($_POST['editor']);
            } else {
                $formErrors['editor'] = BOOK_ERROR_EDITHOR;
            }
        } else {
            $formErrors['editor'] = BOOK_ERROR;
        }

        if (!empty($_POST['language'])) {
            if ($language->countLanguage('id') >  0) {
                $book->id_languages = strip_tags($_POST['language']);
            } else {
                $formErrors['language'] = BOOK_ERROR_LANGUAGE;
            }
        } else {
            $formErrors['language'] = BOOK_ERROR;
        }

        if (!empty($_POST['addType'])) {
                //vérifications du champs input Type (empty + regex)
                $type->typesName = $_POST['addType'];
        }

        if (!empty($_POST['conditions'])) {

            $book->id_conditions = strip_tags($_POST['conditions']);
        } else {
            $formErrors['conditions'] = BOOK_ERROR;
        }

        $booktype = new mangasType;
    }


    if (count($formErrors) == 0) {

        try {
            $tran->beginTransaction();

            $path = 'assets/img/' . uniqid() . '.' . $fileInfo['extension'];
            if (move_uploaded_file($_FILES['image']['tmp_name'], '../../../' . $path)) {
                chmod('../../../' . $path, '664');
                $book->cover = $path;
            }


            if ($_POST['author'] == 'inputAuthor') {
                $author->addAuthor();
                $book->id_authors = $tran->lastInsertId();
            }


            $book->addBookByAdmin();

            $booktype->id_mangaBooks = $tran->lastInsertId();




            if (!empty($type->typesName)) {
                $type->addType();
                $booktype->id_types = $tran->lastInsertId();
                $booktype->addMangasTypes();
            }
            foreach ($_POST['type'] as $t) {
                $type->id = $t;
                if ($type->checkType() == 0) {
                    $erreur = true;
                    break;
                } else {
                    $booktype->id_types = $t;
                    $booktype->addMangasTypes();
                }
            }


            $tran->commit();
        } catch (PDOException $e) {
            $tran->rollBack();
            die($e->getMessage());
        }
    }
}
$conditionsListe = $conditions->getCondition();
$authorListe = $author->gitAuthor();
$categorielist = $categorie->getCategorie();
$editorlist = $editor->getEditor();
$languagelist = $language->getLanguegas();
$typeList = $type->getType();

require_once '../../../views/includes/nav.php';
require_once '../../views/addBook.php';
require_once '../../../views/includes/footer.php';
