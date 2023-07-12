<?php
class cities extends database{
    private $db;
    public int $id = 0;
    public string $postalCode = '';
    public string $city = '';

    public function __construct()
    {
        $this->db = parent::getInstance();
    }

    public function getCitiesList(){
        $query = 'SELECT`id`,`postalCode`,`city` FROM `zvjj1_cities`;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}