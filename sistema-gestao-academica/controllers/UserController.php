<?php
  require_once '../services/users/CreateUserService.php';

  class UserController {
    public function create() {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];

      if ($name === '' or $email === '' or $password === '') {
        header('Location: ../pages/SignUp?error=empty-fields');
        return;
      }

      $wasUserCreated = CreateUserService::execute($name, $email, $password);

      if ($wasUserCreated) {
        header('Location: ../?success=user-created');
      } else {
        header('Location: ../pages/SignUp?error=user-not-created');
      }
    }
  }

  