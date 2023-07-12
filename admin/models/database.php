<?php
// connexion a la base de bonne
class database
{
    protected $db = NULL;
    // stock les prefix dans une variable
    protected string $prefix = 'zvjj1_';

    protected function getInstance()
    {
        if (is_null($this->db)) {

            // try / catch serre a attrape un errore et la stock dans une variable
            try {
                // la connexion avec la base /nom de la base /nom de l utilisateur / mot de passe
                $this->db = new PDO('mysql:host=localhost;dbname=bakito;charset=utf8', 'zvjj1_BAKITO', '199000Tommy@');
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            } catch (PDOException $e) {
                // stock errore
                die($e->getMessage());
            }
        }

        return $this->db;
    }
}
