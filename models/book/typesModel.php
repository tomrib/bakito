<?php
class types extends database
{
    private $db;
    public int $id = 0;
    public string $typesName = '';

    public function __construct()
    {
        $this->db = parent::getInstance();
    }
    /**
     * j'affiche le types des categorie 
     * id pour l'url pour la recherche pas type
     */
    public function getTypes()
    {
        $query = 'SELECT zvjj1_types.id , typesName
        FROM zvjj1_types;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    
}
