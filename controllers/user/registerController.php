<?php
require_once '../../database.php';

require_once '../../models/user/usersModel.php';
require_once '../../models/user/civilitiesModel.php';
require_once '../../models/user/citiesModel.php';
require_once '../../config.php';

$civility = new civilities;
$civilitiesList = $civility->getCivilitiesList();

$city = new cities;
$cityList = $city->getCitiesList();
//TODO variable qui stock met message d'errore
$formErrors = [];



    if (isset($_POST['register'])) {
        $user = new users;
        //!civility
        //TODO ! / pour inverse les fontion
        //TODO !empty / on verifi que le champ ne pas vide
        if (!empty($_POST['civility'])) {
            //TODO on verrifi que le champ corespon au choit donnes
            if ($_POST['civility'] == 1 || $_POST['civility'] == 2 || $_POST['civility'] == 3) {
                //TODO si le choit donne correspon on avoit a la base de bonne
                $user->id_civilities = $_POST['civility'];
            } else {
                $formErrors['civility'] = 'Séclectionner la civilité dans le liste.';
            }
        } else {
            $formErrors['civility'] = 'la civilité est obligatoire.';
        }
        //!lastname
        //TODO on verrifi que le chemp ne pas vide
        if (!empty($_POST['lastname'])) {
            //TODO on verrifi que mon $_POST['lastname'] corepon a ma regex
            if (preg_match($regex['name'], $_POST['lastname'])) {
                //TODO: je met tout en majuscule avec strtoupper
                //TODO: strip_tags / me ploque les balice html et php 
                $user->lastname = strip_tags(strtoupper($_POST['lastname']));
            } else {
                $formErrors['lastname'] = 'Le nom de famille ne peut contenir que des lettres, et des carataire spesiel';
            }
        } else {
            $formErrors['lastname'] = 'Le nom de famille et obligatoire';
        }
        //!firstname
        //TODO on verrifi que le chemp ne pas vide
        if (!empty($_POST['firstname'])) {
            //TODO on verrifi que mon $_POST['name'] corepon a ma regex
            if (preg_match($regex['name'], $_POST['firstname'])) {
                //TODO: ucwords me la premier lettre en majuscule
                $user->firstname = strip_tags(ucwords($_POST['firstname']));
            } else {
                $formErrors['firstname'] = 'Le prénom de famille ne peut contenir que des lettres, et des carataire spesiel';
            }
        } else {
            $formErrors['firstname'] = 'Le prénom et obligatoire';
        }
        //!adress
        if (!empty($_POST['address'])) {
            if ($_POST['address']) {
                $user->address = strip_tags(strtoupper($_POST['address']));
            } else {
                $formErrors['address'] = 'L\'adresse ne peut contenir que des lettres, et des carataire spesiel';
            }
        } else {
            $formErrors['address'] = 'L\'adresse et obligatoire';
        }
        //!code postal
        if (!empty($_POST['city'])) {
            if ($_POST['city']) {
                $user->id_cities = strip_tags(strtoupper($_POST['city']));
            } else {
                $formErrors['postalCcode'] = 'Séclectionner le code postal dans le liste.';
            }
        } else {
            $formErrors['postalCcode'] = 'le code postel est obligatoire.';
        }
        //!email
        if (!empty($_POST['email'])) {
            //TODO: filter_var /Retourne les données filtrées, ou false si le filtre échoue.
            //TODO: FILTER_VALIDATE_EMAIL sa valide le mail
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $user->email = $_POST['email'];
                //TODO: on veriffi que le mail ne soit pas dans la base de bonne
                if ($user->checkIfUserExists('email') > 0) {
                    $formErrors['email'] = '';
                }
            } else {
                $formErrors['email'] = 'l\'adresse mail nes pas valide';
            }
        } else {
            $formErrors['email'] = 'l\'adresse mail est obligatoir';
        }
        //!password
        if (!empty($_POST['password'])) {
            //     if (!preg_match($regex['password'], $_POST['password'])) {
            //     } else {
            //         $formErrors['password'] = 'le mot de passe doit conporte 8 carataires obligatoir';
            //     }
            // } else {
            //     $formErrors['password'] = 'le mot de passe est obligatoire';
        }
        //!confirmPassword
        if (!empty($_POST['confirmPassword'])) {
            //TODO on verifi que le password et strictement identiques sur le password rentre
            if ($_POST['confirmPassword'] === $_POST['password']) {
                //TODO: password_hash / Crée une clé de hachage pour un mot de passe
                //TODO: PASSWORD_BCRYPT / est utilisée pour créer une nouvelle table de hachage 
                //TODO: de mot de passe en utilisant l'algorithme CRYPT_BLOWFISH.
                $user->password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            } else {
                $formErrors['confirmPassword'] = 'les mot de passe neus son pas identique';
            }
        } else {
            $formErrors['confirmPassword'] = 'le mot de passe est obligatoire';
        }
        //TODO: on verifi que aucune errore se produi pour envoyer a la base de bonne
        if (count($formErrors) == 0) {
            if ($user->addUser()) {
                $formErrors['add'] = 'votre inscription a bien été envoyer';
                $formErrors['addP'] = 'Vous pouver vous <a href="./connexion">connecter</a>';
            } else {
                $formErrors['fail'] = 'votre inscription na put aboutir';
            }
        }
    }

require '../../views/includes/nav.php';
require '../../views/user/register.php';
require '../../views/includes/footer.php';
