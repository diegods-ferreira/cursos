<?php
  require_once '../database/connection.php';

  class AlterStudentCourseStatusService {
    public static function execute($id, $status) {
      $connection = Connection::connect();

      $query = 'update student_courses set status = :status where id = :id';

      $statement = $connection->prepare($query);

      $statement->bindValue(':id', $id);
      $statement->bindValue(':status', $status);

      return $statement->execute();
    }
  }