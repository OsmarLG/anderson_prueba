<?php
    include_once(__dir__.'/getData.php');

class Task {
    private $dbData;

    public function __construct() {
        $this->dbData = new getData();
    }

    public function getTasks($project_id){
        $query = "SELECT * FROM tasks as t where t.project_id = $project_id";
        return $this->dbData->selectQuery($query);
    }

    public function getTask($task_id){
        $query = "SELECT * FROM tasks as t where t.id = $task_id";
        return $this->dbData->selectQuery($query);
    }

    public function createTask($name, $description, $project_id) {
        $query = "INSERT INTO tasks (name, description, project_id) VALUES (?, ?, ?)";
        return $this->dbData->insert_query($query, [$name, $description, $project_id]);
    }

    public function updateTask($name, $description, $task_id) {
        $query = "UPDATE tasks SET name = ?, description = ? WHERE id = ?";
        return $this->dbData->update_query($query, [$name, $description, $task_id]);
    }

    public function updateStatusTask($task_status, $task_id) {
        $query = "UPDATE tasks SET status = ? WHERE id = ?";
        return $this->dbData->update_query($query, [$task_status, $task_id]);
    }

    public function destroy($id){
        $query = "DELETE FROM tasks WHERE id = ?";
        return $this->dbData->delete_query($query, [$id]);
    }
}

?>