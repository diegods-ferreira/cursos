<?php
  require_once '../database/connection.php';

  class DeleteStudentCourseService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = 'delete from student_courses where id = :id';

      $statement = $connection->prepare($query);

      $statement->bindValue(':id', $id);

      return $statement->execute();
    }
  }