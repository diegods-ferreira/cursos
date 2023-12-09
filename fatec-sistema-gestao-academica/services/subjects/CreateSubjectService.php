<?php
  require_once '../database/connection.php';

  class CreateSubjectService {
    public static function execute($name, $workload, $summary, $courseId, $userId) {
      $connection = Connection::connect();

      $query = '
        insert into subjects (name, workload, summary, course_id, user_id)
        values (:name, :workload, :summary, :course_id, :user_id)
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':name', $name);
      $statement->bindValue(':workload', $workload);
      $statement->bindValue(':summary', $summary);
      $statement->bindValue(':course_id', $courseId);
      $statement->bindValue(':user_id', $userId);

      return $statement->execute();
    }
  }