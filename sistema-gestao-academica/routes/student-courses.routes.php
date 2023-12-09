<?php
  require_once '../controllers/StudentCourseController.php';

  $action = $_GET['action'];
  $studentCourseController = new StudentCourseController();

  switch ($action) {
    case 'create':
      $studentCourseController->create();
      break;

    case 'update':
      $studentCourseController->update();
      break;

    case 'delete':
      $studentCourseController->delete();
      break;
  }