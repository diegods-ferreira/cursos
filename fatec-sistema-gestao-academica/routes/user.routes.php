<?php
  require_once '../controllers/UserController.php';

  $action = $_GET['action'];
  $userController = new UserController();

  switch ($action) {
    case 'create':
      $userController->create();
      break;
  }