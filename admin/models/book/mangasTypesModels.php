<?php
class mangasType extends database
{
    private $db;
    public int $id_types = 0;
    public int $id_mangaBooks = 0;

    public function __construct()
    {
        $this->db = parent::getInstance();
    }

    public function addMangasTypes()
    {
        $query = 'INSERT INTO `zvjj1_mangastypes`(`id_types`, `id_mangaBooks`)
        VALUES(:id_types, :id_mangaBooks);';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_types', $this->id_types, PDO::PARAM_INT);
        $request->bindValue(':id_mangaBooks', $this->id_mangaBooks, PDO::PARAM_INT);
        return $request->execute();
    }

    public function getMangasTypesById()
    {
        $query = 'SELECT zvjj1_mangastypes.id_types FROM `zvjj1_mangastypes` WHERE `id_mangaBooks` = :id_mangaBooks;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_mangaBooks', $this->id_mangaBooks, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_COLUMN);
    }

    public function deleteType()
    {
        $query = 'DELETE
        FROM
            `zvjj1_mangastypes`
        WHERE
            zvjj1_mangastypes.id_mangaBooks = :id_mangaBooks;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_mangaBooks', $this->id_mangaBooks, PDO::PARAM_INT);
        return  $request->execute();
    }

    public function countType()
    {
        $query = 'SELECT COUNT(id_types)
        FROM zvjj1_mangastypes
        WHERE zvjj1_mangastypes.id_mangaBooks = :id_mangaBooks
        AND zvjj1_mangastypes.id_types = :id_types;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_mangaBooks', $this->id_mangaBooks, PDO::PARAM_INT);
        $request->bindValue(':id_types', $this->id_mangaBooks, PDO::PARAM_INT);
        return  $request->execute();
    }
}
