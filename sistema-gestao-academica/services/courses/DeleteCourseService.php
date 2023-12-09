<?php
  require_once '../database/connection.php';

  class DeleteCourseService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = 'delete from courses where id = :id';

      $statement = $connection->prepare($query);

      $statement->bindValue(':id', $id);

      return $statement->execute();
    }
  }