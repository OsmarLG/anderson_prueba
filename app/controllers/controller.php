<?php
    include_once(__dir__.'/../models/getData.php');
    include_once(__dir__.'/../models/Project.php');

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

            include_once(__dir__."/../views/projects/show.php");
        }
        public function login() {
            include_once(__dir__."/../views/login/login.php");
        }
        public function register() {
            include_once(__dir__."/../views/register/register.php");
        }
        public function validate() {
            include_once(__dir__."/../views/login/php/validate.php");
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