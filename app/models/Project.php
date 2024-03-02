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

    public function createProject($name) {
        $query = "INSERT INTO projects (name) VALUES (?)";
        return $this->dbData->insert_query($query, [$name]);
    }

    public function updateProject($id, $name) {
        $query = "UPDATE projects SET name = ? WHERE id = ?";
        return $this->dbData->update_query($query, [$name, $id]);
    }

    public function destroy($id){
        $query = "DELETE FROM projects WHERE id = ?";
        return $this->dbData->delete_query($query, [$id]);
    }
}

?>