<?php
  require_once '../database/connection.php';

  class DeleteClassService {
    public static function execute($id) {
      $connection = Connection::connect();

      $connection->beginTransaction();

      $query = 'delete from class_subjects where class_id = :id';
      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $subjectsDeleted = $statement->execute();

      $query = 'delete from classes where id = :id';
      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $classDeleted = $statement->execute();

      if ($subjectsDeleted and $classDeleted) {
        $connection->commit();
        return true;
      } else {
        $connection->rollBack();
        return false;
      }
    }
  }