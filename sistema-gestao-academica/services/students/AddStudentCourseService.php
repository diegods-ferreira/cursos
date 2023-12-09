<?php
  require_once '../database/connection.php';

  class AddStudentCourseService {
    public static function execute($actualStudentId, $courseId, $classId, $userId) {
      $connection = Connection::connect();

      $query = '
        insert into student_courses (student_id, course_id, class_id, status, user_id) values (:student_id, :course_id, :class_id, 1, :user_id)
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':student_id', $actualStudentId);
      $statement->bindValue(':course_id', $courseId);
      $statement->bindValue(':class_id', $classId);
      $statement->bindValue(':user_id', $userId);

      return $statement->execute();
    }
  }