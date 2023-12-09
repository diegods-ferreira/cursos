<?php
  class ListStudentCoursesService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = '
        select
          sc.*, c.name as course_name
        from student_courses sc
        left join courses c on c.id = sc.course_id
        where sc.student_id = :student_id
        order by 1 desc
      ';

      $statement = $connection->prepare($query);
      $statement->bindValue(':student_id', $id);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }