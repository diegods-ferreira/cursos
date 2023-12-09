<?php
  require_once '../controllers/SubjectController.php';

  $action = $_GET['action'];
  $subjectController = new SubjectController();

  switch ($action) {
    case 'create':
      $subjectController->create();
      break;

    case 'update':
      $subjectController->update();
      break;

    case 'delete':
      $subjectController->delete();
      break;
  }