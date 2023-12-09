<?php
  require_once '../database/connection.php';

  class UpdateSubjectService {
    public static function execute($id, $name, $workload, $summary, $courseId) {
      $connection = Connection::connect();

      $query = '
        update subjects
        set name = :name,
            workload = :workload,
            summary = :summary,
            course_id = :course_id,
            updated_at = current_timestamp()
        where id = :id
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':id', $id);
      $statement->bindValue(':name', $name);
      $statement->bindValue(':workload', $workload);
      $statement->bindValue(':summary', $summary);
      $statement->bindValue(':course_id', $courseId);

      return $statement->execute();
    }
  }