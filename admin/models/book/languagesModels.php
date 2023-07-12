<?PHP
class language extends database
{
    private $db;
    public int $id = 0;
    public string $languegesName = '';

    public function __construct()
    {
        $this->db = parent::getInstance();
    }
    // je recupaire tout les langue des livre 
    public function getLanguegas()
    {
        $query = 'SELECT 
    zvjj1_languages.id AS idLanguages,languagesName 
    FROM 
    `zvjj1_languages`;';
        $request = $this->db->query($query);
        return  $request->fetchAll(PDO::FETCH_OBJ);
    }

    public function countLanguage()
    {
        $query = 'SELECT COUNT(id)
        FROM zvjj1_languages 
        WHERE id = :id;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
}
