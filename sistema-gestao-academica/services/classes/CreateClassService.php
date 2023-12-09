<?php
  require_once '../database/connection.php';

  class CreateClassService {
    public static function execute($description, $userId) {
      $connection = Connection::connect();

      $query = '
        insert into classes (description, user_id) values (:description, :user_id)
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':description', $description);
      $statement->bindValue(':user_id', $userId);

      return $statement->execute();
    }
  }