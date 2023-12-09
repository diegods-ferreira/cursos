<?php
  require_once '../controllers/ClassController.php';

  $action = $_GET['action'];
  $classController = new ClassController();

  switch ($action) {
    case 'create':
      $classController->create();
      break;

    case 'update':
      $classController->update();
      break;

    case 'delete':
      $classController->delete();
      break;
  }