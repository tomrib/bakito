<?php
class author extends database
{
    private $db;
    public int $id = 0;
    public string $authorsName = '';

    public function __construct()
    {
        $this->db = parent::getInstance();
    }

    public function gitAuthor()
    {
        $query = 'SELECT 
    zvjj1_authors.id AS idAuthor, authorsName 
    FROM `zvjj1_authors`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkauthor()
    {
        $query = 'SELECT COUNT(id)
        FROM zvjj1_authors 
        WHERE zvjj1_authors.id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addAuthor()
    {
        $query ='INSERT INTO `zvjj1_authors`(`authorsName`) 
        VALUES (:authorsName);';
                $request = $this->db->prepare($query);
                $request->bindValue(':authorsName', $this->authorsName, PDO::PARAM_STR);
                return $request->execute();
    }
}
