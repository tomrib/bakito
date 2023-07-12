<?php
class type extends database
{
    private $db;
    public int $id = 0;
    public string $typesName = '';

    public function __construct()
    {
        $this->db = parent::getInstance();
    }

    public function getType()
    {
        $query = 'SELECT
        zvjj1_types.id,
        typesName
    FROM
        `zvjj1_types`;';
        $request = $this->db->query($query);
        return  $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function addType()
    {
        $query = 'INSERT INTO `zvjj1_types`(`id`,`typesName`) VALUES (:id,:typesName);';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':typesName', $this->typesName, PDO::PARAM_STR);
        $request->execute();
        $id_types = $this->db->lastInsertId();
        return $id_types;
    }

    /**
     * Fonction vérifiant l'existance du type dans la base de données
     * @param id l'id du type envoyé par le formulaire
     * @return
     */
    public function checkType()
    {
        $query = 'SELECT COUNT(id)
        FROM 
        zvjj1_types
        WHERE 
        id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
}
