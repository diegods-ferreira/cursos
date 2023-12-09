<?php
  require_once '../database/connection.php';

  class DeleteClassSubjectService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = 'delete from class_subjects where id = :id';

      $statement = $connection->prepare($query);

      $statement->bindValue(':id', $id);

      return $statement->execute();
    }
  }