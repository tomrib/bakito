<?php
class transaction extends database
{
    private $db;
    public function __construct()
    {
        $this->db = parent::getInstance();
    }
        
    /**
     * @param {int} lastInsertId() recuper id du dernier ajoute
     */
    public function lastInsertId()
    {
        return $this->db->lastInsertId();

    }

    /**
     * beginTransaction() il veriffi que la base de donne et ouvaire
     */
    public function beginTransaction()
    {
        return $this->db->beginTransaction();
    }
   /**
     * @param commit() il commit avec la base de donne
     */
    public function commit()
    {
        return $this->db->commit();
    }
       /**
     * @param rollBack() ci il y a une erreur il retour au dedut
     */
    public function rollBack()
    {
        return $this->db->rollBack();
    }
}
