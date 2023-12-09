<?php
  require_once '../controllers/SessionController.php';

  $action = $_GET['action'];
  $sessionController = new SessionController();

  switch ($action) {
    case 'sign-in':
      $sessionController->create();
      break;

    case 'sign-out':
      $sessionController->delete();
      break;
  }