<?php
class editor extends database
{
    private $db;
    public int $id = 0;
    public string $edithorsName = '';

    public function __construct()
    {
        $this->db = parent::getInstance();
    }

    public function getEditor()
    {
        $query = 'SELECT
        zvjj1_editors.id AS idEditor,
        editorsName
    FROM
        `zvjj1_editors`;';
        $request = $this->db->query($query);
        return  $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkEditor()
    {
        $query = 'SELECT
        COUNT(id)
    FROM
        zvjj1_editors
       WHERE zvjj1_editors.id = :id;';
       $request = $this->db->prepare($query);
       $request->bindValue(':id', $this->id, PDO::PARAM_INT);
       return $request->execute();
    }
}
