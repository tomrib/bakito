<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location:/accueil');
    exit;
}
require_once '../../database.php';

require_once '../../models/user/usersModel.php';
require_once '../../models/user/citiesModel.php';
require_once '../../config.php';

$formErrors = [];

$getUserId = new users;
$getUserId->id = $_SESSION['user']['id'];
$getUser = $getUserId->getUser();

$city = new cities;
$cityList = $city->getCitiesList();


$checkPas = new users;
$checkPas->id = $_SESSION['user']['id'];
$pass = $checkPas->checkPassword();

$update = new users;

foreach ($getUser as $gu) {
    if (count($_POST) > 0) {
        //on fait une nouvelle unstance
        $update->id = $_SESSION['user']['id'];

        if (!empty($_POST['lastname'])) {
            //je veriffie que le champ ne soit pas vide
            if (preg_match($regex['name'], $_POST['lastname'])) {
                //je veriffie que le lastname corespon a la regex
                $update->lastname = strip_tags($_POST['lastname']);
            } else {
                $formErrors['lastname'] = USER_LASTNAME_ERROR_INVALID;
            }
        } else {
            $update->lastname = $gu->lastname;
        }

        if (!empty($_POST['firstname'])) {
            if (preg_match($regex['name'], $_POST['firstname'])) {
                $update->firstname = strip_tags($_POST['firstname']);
            } else {
                $formErrors['firstname'] = USER_LASTNAME_ERROR_INVALID;
            }
        } else {
            $update->firstname = $gu->firstname;
        }

        if (!empty($_POST['email'])) {
            //filter_var /Retourne les données filtrées, ou false si le filtre échoue.
            //FILTER_VALIDATE_EMAIL sa valide le mail
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $update->email = $_POST['email'];
            } else {
                $formErrors['email'] = USER_EMAIL_ERROR_INVALID;
            }
        } else {
            $update->email = $gu->email;
        }

        if (!empty($_POST['address'])) {
            if (!preg_match($regex['content'], $_POST['address'])) {
                $update->address = strip_tags(strtoupper($_POST['address']));
            } else {
                $formErrors['address'] = USER_ADDRESS_ERROR_INVALID;
            }
        } else {
            $update->address = $gu->id;
        }

        if (!empty($_POST['city'])) {
            if (preg_match($regex['tome'], $_POST['city'])) {
                $update->id_cities = strip_tags(strtoupper($_POST['city']));
            } else {
                $formErrors['city'] = USER_ADDRESS_ERROR_INVALID;
            }
        } else {
            $update->id_cities = $gu->id;
        }

        if (!empty($_POST['password'])) {
            if (password_verify($_POST['password'], $pass[0]['password'])) {
                $update->updeteUser();
            } else {
                $formErrors['password'] = USER_PASSWORD_INVALID;
            }
        } else {
            $formErrors['password'] = USER_PASSWORD_VALIDETION;
        }
    }
}

$delete = new users;
$delete->id = $_SESSION['user']['id'];
if(isset($_POST['deleteUser'])){
    $delete->deleteUser();
    header('location:/Deconnexion');
}


require_once '../../views/includes/nav.php';
require_once '../../views/user/profil.php';
require_once '../../views/includes/footer.php';