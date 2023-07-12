<?php
class book extends database
{
    private $db;
    public int $id = 0;
    public string $bookName = '';
    public string $tomeNumber = '';
    public string $description = '';
    public string $releaseDate = '';
    public string $cover = '';
    public string $price = '';
    public string $id_conditions = '';
    public string $id_editors = '';
    public string $id_languages = '';
    public string $id_authors = '';
    public string $id_categories = '';
    public int $debut = 0;
    public int $countBook = 0;

    public function __construct()
    {
        $this->db = parent::getInstance();
    }
    public function addBook()
    {
        $query = 'INSERT INTO 
        zvjj1_mangabooks
        (bookName,tomeNumber,description,releaseDate,cover, price,id_conditions,id_editors,id_languages,id_authors,id_categories) 
        VALUES (:bookName,:tomeNumber,:description,:releaseDate,:cover,price,:id_conditions,:id_editors,:id_languages,:id_authors,:id_categories);';
        $request = $this->db->prepare($query);
        $request->bindValue(':bookName', $this->bookName, PDO::PARAM_STR);
        $request->bindValue(':tomeNumber', $this->tomeNumber, PDO::PARAM_STR);
        $request->bindValue(':description', $this->description, PDO::PARAM_STR);
        $request->bindValue(':releaseDate', $this->releaseDate, PDO::PARAM_STR);
        $request->bindValue(':cover', $this->cover, PDO::PARAM_STR);
        $request->bindValue(':price', $this->price, PDO::PARAM_INT);
        $request->bindValue(':id_conditions', $this->id_conditions, PDO::PARAM_INT);
        $request->bindValue(':id_editors', $this->id_editors, PDO::PARAM_INT);
        $request->bindValue(':id_languages', $this->id_languages, PDO::PARAM_INT);
        $request->bindValue(':id_authors', $this->id_authors, PDO::PARAM_INT);
        $request->bindValue(':id_authors', $this->id_authors, PDO::PARAM_INT);
        $request->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        return $request->execute();
    }

    public function getBookList()
    {
        $query = 'SELECT id,cover,bookName,tomeNumber,releaseDate 
    FROM zvjj1_mangabooks 
    GROUP BY zvjj1_mangabooks.bookName ASC;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBookDesc()
    {
        $query = 'SELECT id,cover,bookName,tomeNumber,releaseDate 
    FROM zvjj1_mangabooks 
    GROUP BY zvjj1_mangabooks.id DESC;';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function countBookListById()
    {
        $query = 'SELECT COUNT(id) AS countIdPosts
        FROM zvjj1_mangabooks 
        ';
        $request = $this->db->query($query);
        return $request->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getckBookListById()
    {
        $query = "SELECT zvjj1_mangabooks.id,bookName,tomeNumber,description,DATE_FORMAT(releaseDate, '%d %b %Y') AS releaseDate,cover,price, 
    zvjj1_languages.languagesName, 
    zvjj1_conditions.conditionsName, 
    zvjj1_editors.editorsName, 
    zvjj1_authors.authorsName, 
    zvjj1_categories.catagorieName 
    FROM zvjj1_mangabooks 
    INNER JOIN zvjj1_languages ON zvjj1_mangabooks.id_languages = zvjj1_languages.id 
    INNER JOIN zvjj1_conditions ON zvjj1_mangabooks.id_conditions = zvjj1_conditions.id 
    INNER JOIN zvjj1_editors ON zvjj1_mangabooks.id_editors = zvjj1_editors.id 
    INNER JOIN zvjj1_authors ON zvjj1_mangabooks.id_authors = zvjj1_authors.id 
    INNER JOIN zvjj1_categories ON zvjj1_mangabooks.id_categories = zvjj1_categories.id
    WHERE zvjj1_mangabooks.id = :id;";
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function researBookList()
    {
        $query = "SELECT zvjj1_mangabooks.id,bookName,tomeNumber,description,DATE_FORMAT(releaseDate, '%d %b %Y') AS releaseDate,cover,price, 
    zvjj1_languages.languagesName, 
    zvjj1_conditions.conditionsName, 
    zvjj1_editors.editorsName, 
    zvjj1_authors.authorsName, 
    zvjj1_categories.catagorieName 
    FROM zvjj1_mangabooks 
    INNER JOIN zvjj1_languages ON zvjj1_mangabooks.id_languages = zvjj1_languages.id 
    INNER JOIN zvjj1_conditions ON zvjj1_mangabooks.id_conditions = zvjj1_conditions.id 
    INNER JOIN zvjj1_editors ON zvjj1_mangabooks.id_editors = zvjj1_editors.id 
    INNER JOIN zvjj1_authors ON zvjj1_mangabooks.id_authors = zvjj1_authors.id 
    INNER JOIN zvjj1_categories ON zvjj1_mangabooks.id_categories = zvjj1_categories.id
    WHERE zvjj1_mangabooks.bookName LIKE :bookName  ORDER BY zvjj1_mangabooks.id DESC;";
        $request = $this->db->prepare($query);
        $request->bindValue(':bookName', '%' . $this->bookName . '%', PDO::PARAM_STR);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function typeBook()
    {
        $query = "SELECT
    zvjj1_mangabooks.id,
    zvjj1_mangabooks.bookName,
    cover,
    DATE_FORMAT(releaseDate, '%d %b %Y') AS Date,
    zvjj1_mangabooks.tomeNumber
FROM
    zvjj1_mangastypes
INNER JOIN zvjj1_types ON zvjj1_mangastypes.id_types = zvjj1_types.id
INNER JOIN zvjj1_mangabooks ON zvjj1_mangastypes.id_mangaBooks = zvjj1_mangabooks.id
WHERE
    zvjj1_types.id = :id ;";
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function getBooks()
    {
        $query = 'SELECT
        id,
            bookName,
            cover
        FROM
            `zvjj1_mangabooks`
            WHERE  
            zvjj1_mangabooks.id GROUP BY id DESC
            HAVING zvjj1_mangabooks.id LIMIT 0, 10;';
            $request = $this->db->query($query);
            return $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteBook()
{
    $query ='DELETE FROM `zvjj1_mangabooks` WHERE zvjj1_mangabooks.id = :id;';
    $request = $this->db->prepare($query);
    $request->bindValue(':id',$this->id,PDO::PARAM_INT);
    return  $request->execute();
}
}
