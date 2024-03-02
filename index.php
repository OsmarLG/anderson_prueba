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
            case 'show_project':
                $mvc->show_project();
                break;
            case 'create_project':
                $mvc->create_project();
                break;
            case 'store_project':
                $mvc->store_project();
                break;
            case 'edit_project':
                $mvc->edit_project();
                break;
            case 'update_project':
                $mvc->update_project();
                break;
            case 'delete_project':
                $mvc->delete_project();
                break;
            case 'create_task':
                $mvc->create_task();
                break;
            case 'store_task':
                $mvc->store_task();
                break;
            case 'edit_task':
                $mvc->edit_task();
                break;
            case 'update_task':
                $mvc->update_task();
                break;
            case 'update_status_task':
                $mvc->update_status_task();
                break;
            case 'delete_task':
                $mvc->delete_task();
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
            case 'register':
                $mvc->register();
                break;
            case 'register_validate':
                $mvc->register_validate();
                break;
            default:
                $mvc->index();
                break;
        }
    } else {
        $mvc->index();
    }
}