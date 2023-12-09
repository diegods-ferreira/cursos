<?php
  require_once '../controllers/ClassSubjectController.php';

  $action = $_GET['action'];
  $classSubjectController = new ClassSubjectController();

  switch ($action) {
    case 'create':
      $classSubjectController->create();
      break;

    case 'delete':
      $classSubjectController->delete();
      break;
  }