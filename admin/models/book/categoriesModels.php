<?php 
class categorie extends database 
{
    private $db;
    public int $id = 0;
    public string $ctagorieName = '';

    public function __construct()
    {
        $this->db = parent::getInstance();
    }

    public function getCategorie()
    {
        $query = 'SELECT
        id,
        catagorieName
    FROM
        `zvjj1_categories`;';
        $request = $this->db->query($query);
        return  $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkCategories()
    {
        $query = 'SELECT
        COUNT(id)
    FROM
        zvjj1_categories
          WHERE 
          id = :id;';
          $request = $this->db->prepare($query);
          $request->bindValue(':id', $this->id, PDO::PARAM_INT);
          $request->execute();
          return $request->fetchAll(PDO::FETCH_ASSOC);
    }



}