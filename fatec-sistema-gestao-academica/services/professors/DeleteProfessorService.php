<?php
  require_once '../database/connection.php';

  class DeleteProfessorService {
    public static function execute($id) {
      $connection = Connection::connect();

      $connection->beginTransaction();

      $query = 'delete from professor_subjects where professor_id = :professor_id';
      $statement = $connection->prepare($query);
      $statement->bindValue(':professor_id', $id);
      $subjectsDeleted = $statement->execute();

      $query = 'delete from professors where id = :id';
      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $professorDeleted = $statement->execute();

      if ($subjectsDeleted and $professorDeleted) {
        $connection->commit();
        return true;
      } else {
        $connection->rollBack();
        return false;
      }
    }
  }