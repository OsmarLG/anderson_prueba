<?php
    include_once(__dir__.'/../models/getData.php');

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
            include_once(__dir__."/../views/home/home.php");
        }
        public function login() {
            include_once(__dir__."/../views/login/login.php");
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