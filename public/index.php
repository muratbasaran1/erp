<?php
require_once __DIR__ . '/../src/Controllers/BeneficiaryController.php';

$action = $_GET['action'] ?? 'index';
$controller = new BeneficiaryController();

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'show':
        $controller->show();
        break;
    case 'delete':
        $controller->delete();
        break;
    case 'export':
        $controller->export();
        break;
    default:
        $controller->index();
        break;
}
