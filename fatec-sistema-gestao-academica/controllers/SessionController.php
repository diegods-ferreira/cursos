<?php
  require_once '../services/auth/SignInUserService.php';

  class SessionController {
    public function create() {
      $email = $_POST['email'];
      $password = $_POST['password'];

      $user = SignInUserService::execute($email, $password);

      if (!empty($user)) {
        session_start();

        $_SESSION['user:id'] = $user->id;
        $_SESSION['user:name'] = $user->name;
        $_SESSION['user:email'] = $user->email;
        $_SESSION['user:created_at'] = $user->created_at;
        $_SESSION['user:updated_at'] = $user->updated_at;
        
        header('Location: ../pages/Home');
      } else {
        header('Location: ../?error=user-not-found');
      }
    }

    public function delete() {
      session_start();

      if (isset($_SESSION['user:id'])) {
        session_destroy();
        header('Location: ../');
      }
    }
  }

  