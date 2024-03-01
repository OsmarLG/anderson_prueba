include_once 'getData.php';

class Project {
    private $dbData;

    public function __construct() {
        $this->dbData = new getData();
    }

    public function getAllProjects() {
        $query = "SELECT * FROM projects";
        return $this->dbData->selectQuery($query);
    }
}
