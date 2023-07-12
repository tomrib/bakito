<?php
session_start();
require_once '../../database.php';
require_once '../../models/user/usersModel.php';
require_once '../../config.php';

$formErrors = [];

$user = new users;
if (count($_POST) > 0) {
    
    if (!empty($_POST['loginEmail'])) {
        $user->email = $_POST['loginEmail'];
        if ($user->checkIfUserExists('email') > 0) {
            $password = $user->getPassword();
        } else {
            $formErrors['loginEmail'] = 'Nom d\'utilisateur ou mot de passe incorette 1';
        }
    } else {
        $formErrors['loginEmail'] = 8;
    }
    if (!empty($_POST['loginPassword'])) {
        if (isset($password)) {
            if (password_verify($_POST['loginPassword'], $password)) {
                $_SESSION['user'] = $user->getIds();
                header('Location: ./accueil');
                exit;  
            } else {
                $formErrors['loginEmail'] = 'Nom d\'utilisateur ou mot de passe incorette 2';
            }
    }else{
        $formErrors['loginEmail'] = 'Nom d\'utilisateur ou mot de passe incorette 3';
    }
} else {
    $formErrors['loginEmail'] = 'Nom d\'utilisateur ou mot de passe incorette 4';
}
}

require_once '../../views/includes/nav.php';
require_once '../../views/user/login.php';
require_once '../../views/includes/footer.php';