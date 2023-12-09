<?php
  require_once '../database/connection.php';

  class CreateUserService {
    public static function execute($name, $email, $password) {
      $connection = Connection::connect();

      $query = '
        insert into users (name, email, password) values (:name, :email, :password)
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':name', $name);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':password', md5($password));

      return $statement->execute();
    }
  }