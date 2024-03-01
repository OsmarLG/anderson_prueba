<?php
    include_once(__dir__.'/getData.php');

class Project {
    private $dbData;

    public function __construct() {
        $this->dbData = new getData();
    }

    public function getAllProjects() {
        $query = "SELECT * FROM projects";
        return $this->dbData->selectQuery($query);
    }

    public function getProject($id){
        $query = "SELECT * FROM projects as p where p.id = $id";
        return $this->dbData->selectQuery($query);
    }
}

?>