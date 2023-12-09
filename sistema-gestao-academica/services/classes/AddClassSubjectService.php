<?php
  require_once '../database/connection.php';

  class AddClassSubjectService {
    public static function execute($classId, $subjectId, $professorId) {
      $connection = Connection::connect();

      $query = '
        insert into class_subjects (class_id, subject_id, professor_id) values (:class_id, :subject_id, :professor_id)
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':class_id', $classId);
      $statement->bindValue(':subject_id', $subjectId);
      $statement->bindValue(':professor_id', $professorId);

      return $statement->execute();
    }
  }