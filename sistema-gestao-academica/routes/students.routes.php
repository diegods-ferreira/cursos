<?php
  require_once '../controllers/StudentController.php';

  $action = $_GET['action'];
  $studentController = new StudentController();

  switch ($action) {
    case 'create':
      $studentController->create();
      break;

    case 'update':
      $studentController->update();
      break;

    case 'delete':
      $studentController->delete();
      break;
  }