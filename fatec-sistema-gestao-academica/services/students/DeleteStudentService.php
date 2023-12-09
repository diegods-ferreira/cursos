<?php
  require_once '../database/connection.php';

  class DeleteStudentService {
    public static function execute($id) {
      $connection = Connection::connect();

      $connection->beginTransaction();

      $query = 'delete from student_courses where student_id = :id';
      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $coursesDeleted = $statement->execute();

      $query = 'delete from students where id = :id';
      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $studentDeleted = $statement->execute();

      if ($coursesDeleted and $studentDeleted) {
        $connection->commit();
        return true;
      } else {
        $connection->rollBack();
        return false;
      }
    }
  }