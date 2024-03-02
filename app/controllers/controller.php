<?php
    include_once(__dir__.'/../models/getData.php');
    include_once(__dir__.'/../models/Project.php');
    include_once(__dir__.'/../models/Task.php');

    class controller {
        public static $rutaAPP = '/anderson_prueba/';

        public function init_login() {
            if (isset($_SESSION)) {
                session_start();
            } else {
                session_start();
            }
            if (isset($_SESSION['user'])){
                return true;
            }
            return false;
        }

        public function home() {
            $projectModel = new Project();
            $proyectos = $projectModel->getAllProjects();

            include_once(__dir__."/../views/home/home.php");
        }

        public function show_project() {
            $projectId = $_GET['id'] ?? null;
            $projectModel = new Project();
            $proyecto = $projectModel->getProject($projectId);
            $taskModel = new Task();
            $tasks = $taskModel->getTasks($proyecto[0]['id']);

            include_once(__dir__."/../views/projects/show.php");
        }
        public function create_project() {
            include_once(__dir__."/../views/projects/create.php");
        }
        public function store_project() {
            include_once(__dir__."/../views/projects/php/store.php");
        }
        public function edit_project() {
            $projectId = $_GET['id'] ?? null;
            $projectModel = new Project();
            $proyecto = $projectModel->getProject($projectId);

            include_once(__dir__."/../views/projects/edit.php");
        }
        public function update_project() {
            include_once(__dir__."/../views/projects/php/update.php");
        }
        public function delete_project() {
            include_once(__dir__."/../views/projects/php/delete.php");
        }
        public function create_task() {
            $project_id = $_GET['project_id'] ?? null;

            include_once(__dir__."/../views/tasks/create.php");
        }
        public function store_task() {
            include_once(__dir__."/../views/tasks/php/store.php");
        }
        public function edit_task() {
            $task_id = $_GET['task_id'] ?? null;
            $project_id = $_GET['project_id'] ?? null;
            $taskModel = new Task();
            $task = $taskModel->getTask($task_id);
            
            include_once(__dir__."/../views/tasks/edit.php");
        }
        public function update_task() {
            include_once(__dir__."/../views/tasks/php/update.php");
        }
        public function update_status_task() {
            include_once(__dir__."/../views/tasks/php/update_status.php");
        }
        public function delete_task() {
            include_once(__dir__."/../views/tasks/php/delete.php");
        }
        public function login() {
            include_once(__dir__."/../views/login/login.php");
        }
        public function validate() {
            include_once(__dir__."/../views/login/php/validate.php");
        }
        public function register() {
            include_once(__dir__."/../views/register/register.php");
        }
        public function register_validate() {
            include_once(__dir__."/../views/register/php/validate.php");
        }

        public function logout() {
            if (isset($_SESSION)) {
                session_start();
            }
            session_destroy();
            header('Location: '.controller::$rutaAPP.'index.php?/login');
        }

        public function index(){
            include_once(__dir__."/../views/login/login.php");
        }
    }
?>