<?php
  require_once '../controllers/CourseController.php';

  $action = $_GET['action'];
  $courseController = new CourseController();

  switch ($action) {
    case 'create':
      $courseController->create();
      break;

    case 'update':
      $courseController->update();
      break;

    case 'delete':
      $courseController->delete();
      break;
  }