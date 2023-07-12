<?php
// connexion a la base de bonne
// Cette classe PHP permet de se connecter à une base de données
class database
{
    // Déclare une variable privée pour stocker l'instance de la base de données
    private static $db = NULL;
    
    // Déclare une variable protégée pour stocker le préfixe de la table
    protected string $prefix = 'zvjj1_';

    // Déclare une fonction pour obtenir l'instance de la base de données
    protected function getInstance()
    {
        // Si l'instance de la base de données est nulle, créez une nouvelle instance
        if (is_null(self::$db)) {
            // Tentez de vous connecter à la base de données et capturez les erreurs éventuelles
            try {
                self::$db = new PDO('mysql:host=localhost;dbname=bakito;charset=utf8', 'zvjj1_BAKITO', '199000Tommy@');
                // Définir le mode d'erreur sur exception
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                // Stockez l'erreur et arrêtez le script
                die($e->getMessage());
            }
        }

        return self::$db;
    }
}