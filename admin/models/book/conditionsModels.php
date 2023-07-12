<?php
class conditions extends database
{
    private $db;
    public int $id = 0;
    public string $conditionsName = '';

    public function __construct()
    {
        $this->db = parent::getInstance();
    }

    public function getCondition()
    {
        $query = 'SELECT
        `id`,
        `conditionsName`
        FROM
        `zvjj1_conditions`;';
    
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}
