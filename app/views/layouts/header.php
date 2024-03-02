<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 100px;
        }

        .card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .container {
            max-width: 1200px;
            margin: auto;
        }

        .navbar {
            padding: 0.5rem 1rem;
        }

        .nav-link svg {
            width: 24px;
            height: 24px;
        }

        @media (min-width: 768px) {
            .nav-link svg {
                width: 20px;
                height: 20px;
            }
        }

        @media (min-width: 1024px) {
            .nav-link svg {
                width: 20px;
                height: 20px;
            }
        }
    </style>
</head>
<body>
<?php
    if (isset($_SESSION['user'])){
        include_once $viewPath . '/components/menu.php';
    }
?>