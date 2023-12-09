<?php
  class CountCourseSubjectsService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = '
        select count(1) as dependencies
        from subjects s
        where s.course_id = :id
      ';

      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }