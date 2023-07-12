<?php
$regex = [
    'name' => '/^[A-Za-z\- áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{1,20}$/',
    'password' => '/^[\w$@%*+\-_!]{8,15}$/',
    'date' => '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',
    'tome' => '/^[0-9]{1,3}$/',
    'content' => '/(<script>)/',
    'price'=> '/\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})?/'
];

$mime_types = array(
    'png' => 'image/png',
    'jpeg' => 'image/jpeg',
    'jpg' => 'image/jpeg',
    'gif' => 'image/gif',
);


define('USER_LASTNAME_ERROR_EMPTY', 'Le nom de famille est obligatoire.');
define('USER_LASTNAME_ERROR_INVALID', 'Le champ ne peut comporter que des lettres en majuscule et minuscule, des tirets ou des espaces. Il ne peut contenir que 20 caractères.');

define('USER_FIRSTNAME_ERROR_EMPTY', 'Le prénom est obligatoire.');

define('USER_USERNAME_ERROR_ALREADY_EXISTS', 'Ce nom d\'utilisateur existe déjà.');


define('USER_EMAIL_ERROR_ALREADY_EXISTS', 'Cette adresse mail est déjà utilisée.');
define('USER_EMAIL_ERROR_EMPTY', 'Le mail est obligatoire.');
define('USER_EMAIL_ERROR_INVALID', 'l\'adresse mail nes pas valide');

define('USER_PASSWORD_VALIDETION', 'Mot de passe obligatoire pour valider les modifications');
define('USER_PASSWORD_INVALID', 'Mot de passe nes pas valide');

define('USER_ADDRESS_ERROR_INVALID','L\'adresse ne peut contenir que des lettres, et des carataire spesiel');

define('USER_LOGIN_ERROR',  `Nom d'utilisateur ou mot de passe incorette`);

define('BOOK_ERROR', 'Le champ est obligatoire.');
define('BOOK_ERROR_INVALID', 'Les balice <script> ne pas autorisé');

define('BOOK_ERROR_TOME', 'le tome ne peux conporte que des numeros');

define('BOOK_ERROR_LANGUAGE', 'la langue ne pas valide');

define('BOOK_ERROR_DATE', 'la date ne peux conporte que des numeros');

define('BOOK_ERROR_PRICE', 'le prix ne peux conporte que des numeros');

define('BOOK_ERROR_AUTHOR','L\'auteur nes pas valible');

define('BOOK_ERROR_TYPE','Le type est obligatoire.');
define('BOOK_ERROR_TYPE_INVALID','le types excite dégât.');

define('BOOK_ERROR_CATEGORIES','la categori ne pas valide.');

define('BOOK_ERROR_EDITHOR','l\'editeur ne pas valide.');

define('USER_POST_ERROR','L\'image est obligatoire');
define('USER_POST_ERROR_IMAGE','L\'image et trop volumine 20MO');
define('USER_POST_ERROR_INVALID_IMAGE','L\'image nes pas conforme');