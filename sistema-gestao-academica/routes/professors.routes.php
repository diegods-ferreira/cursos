<?php
  require_once '../controllers/ProfessorController.php';

  $action = $_GET['action'];
  $professorController = new ProfessorController();

  switch ($action) {
    case 'create':
      $professorController->create();
      break;

    case 'update':
      $professorController->update();
      break;

    case 'delete':
      $professorController->delete();
      break;
  }