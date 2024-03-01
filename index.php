<?php
require_once 'app/controllers/controller.php';

$mvc = new controller();
date_default_timezone_set('America/Mazatlan');

if ($mvc->init_login()) {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'home':
                $mvc->home();
                break;
            case 'logout':
                $mvc->logout();
                break;
            default:
                $mvc->home();
                break;
        }
    } else {
        $mvc->home();
    }
} else {
    if (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'login':
                $mvc->login();
            case 'validate':
                $mvc->validate();
                break;
            default:
                $mvc->index();
                break;
        }
    } else {
        $mvc->index();
    }
}