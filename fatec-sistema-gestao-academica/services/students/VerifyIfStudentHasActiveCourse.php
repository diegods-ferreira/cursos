<?php
  class VerifyIfStudentHasActiveCourse {
    public static function execute($studentId) {
      $connection = Connection::connect();

      $query = 'select count(1) as dependencies from student_courses where student_id = :student_id and status = 1';

      $statement = $connection->prepare($query);
      $statement->bindValue(':student_id', $studentId);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }