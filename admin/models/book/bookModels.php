<?php
class book extends database
{
    private $db;
    public int $id = 0;
    public string $bookName = '';
    public int $tomeNumber = 0;
    public string $description = '';
    public string $releaseDate = '';
    public string $cover = '';
    public string $price = '';
    public int $id_conditions = 0;
    public int $id_editors = 0;
    public int $id_languages = 0;
    public int $id_authors = 0;
    public int $id_categories = 0;

    public function __construct()
    {
        $this->db = parent::getInstance();
    }

    /**
     * Ajoute un livre à la base de données par un administrateur
     *
     * @return bool Retourne true si l'insertion a réussi, false sinon
     */
    public function addBookByAdmin()
    {
        // Requête SQL pour insérer les données du livre dans la base de données
        $query = 'INSERT INTO `zvjj1_mangabooks`(
        `id`,
        `bookName`,
        `tomeNumber`,
        `description`,
        `releaseDate`,
        `cover`,
        `price`,
        `id_conditions`,
        `id_authors`,
        `id_categories`,
        `id_languages`,
        `id_editors`
    )
    VALUES(
        :id,
        :bookName,
        :tomeNumber,
        :description,
        :releaseDate,
        :cover,
        :price,
        :id_conditions,
        :id_editors,
        :id_languages,
        :id_authors,
        :id_categories
    );';
        $request = $this->db->prepare($query);

        // Associe les valeurs à la requête préparée
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':bookName', $this->bookName, PDO::PARAM_STR);
        $request->bindValue(':tomeNumber', $this->tomeNumber, PDO::PARAM_INT);
        $request->bindValue(':description', $this->description, PDO::PARAM_STR);
        $request->bindValue(':releaseDate', $this->releaseDate, PDO::PARAM_STR);
        $request->bindValue(':cover', $this->cover, PDO::PARAM_STR);
        $request->bindValue(':price', $this->price, PDO::PARAM_STR);
        $request->bindValue(':id_conditions', $this->id_conditions, PDO::PARAM_INT);
        $request->bindValue(':id_editors', $this->id_editors, PDO::PARAM_INT);
        $request->bindValue(':id_languages', $this->id_languages, PDO::PARAM_INT);
        $request->bindValue(':id_authors', $this->id_authors, PDO::PARAM_INT);
        $request->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);

        // Exécute la requête et retourne un booléen pour indiquer si l'insertion a réussi
        return $request->execute();
    }




    public function countIdBook()
    {
        $query = 'SELECT COUNT(id) 
        FROM zvjj1_mangabooks ';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBook()
    {
        $query = "SELECT
        `id`,
        `bookName`,
        `tomeNumber`,
        `description`,
        `releaseDate`,
        `cover`,
        `price`,
        `id_conditions`,
        `id_editors`,
        `id_languages`,
        `id_authors`,
        `id_categories`
    FROM
        zvjj1_mangabooks
    WHERE
        zvjj1_mangabooks.id = :id;";
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function updetebook()
    {
        $query = 'UPDATE
    `zvjj1_mangabooks`
SET
    `bookName` = :bookName,
    `tomeNumber` = :tomeNumber,
    `description` = :description,
    `releaseDate` = :releaseDate,
    `cover` = :cover,
    `price` = :price,
    `id_conditions` = :id_conditions,
    `id_editors` = :id_editors,
    `id_languages` = :id_languages ,
    `id_authors` = :id_authors,
    `id_categories` = :id_categories
WHERE
zvjj1_mangabooks.id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->bindValue(':bookName', $this->bookName, PDO::PARAM_STR);
        $request->bindValue(':tomeNumber', $this->tomeNumber, PDO::PARAM_INT);
        $request->bindValue(':description', $this->description, PDO::PARAM_STR);
        $request->bindValue(':releaseDate', $this->releaseDate, PDO::PARAM_STR);
        $request->bindValue(':cover', $this->cover, PDO::PARAM_STR);
        $request->bindValue(':price', $this->price, PDO::PARAM_INT);
        $request->bindValue(':id_conditions', $this->id_conditions, PDO::PARAM_INT);
        $request->bindValue(':id_editors', $this->id_editors, PDO::PARAM_INT);
        $request->bindValue(':id_languages', $this->id_languages, PDO::PARAM_INT);
        $request->bindValue(':id_authors', $this->id_authors, PDO::PARAM_INT);
        $request->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return  $request->execute();
    }
}
