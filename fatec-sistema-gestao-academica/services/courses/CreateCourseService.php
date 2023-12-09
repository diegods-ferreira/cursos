<?php
  require_once '../database/connection.php';

  class CreateCourseService {
    public static function execute($name, $description, $period, $userId) {
      $connection = Connection::connect();

      $query = '
        insert into courses (name, description, period, user_id) values (:name, :description, :period, :user_id)
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':name', $name);
      $statement->bindValue(':description', $description);
      $statement->bindValue(':period', $period);
      $statement->bindValue(':user_id', $userId);

      return $statement->execute();
    }
  }