<?php
  require_once '../database/connection.php';

  class UpdateCourseService {
    public static function execute($id, $name, $description, $period) {
      $connection = Connection::connect();

      $query = '
        update courses
        set name = :name,
            description = :description,
            period = :period,
            updated_at = current_timestamp()
        where id = :id
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':id', $id);
      $statement->bindValue(':name', $name);
      $statement->bindValue(':description', $description);
      $statement->bindValue(':period', $period);

      return $statement->execute();
    }
  }