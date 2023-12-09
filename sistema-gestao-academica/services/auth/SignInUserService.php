<?php
  require_once '../database/connection.php';

  class SignInUserService {
    public static function execute($email, $password) {
      $connection = Connection::connect();

      $query = '
        select * from users where email = :email and password = :password
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':email', $email);
      $statement->bindValue(':password', md5($password));

      $statement->execute();

      $user = $statement->fetch(PDO::FETCH_OBJ);

      if (!$user) {
        return null;
      }

      return $user;
    }
  }