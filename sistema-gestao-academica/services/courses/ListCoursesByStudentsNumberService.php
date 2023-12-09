<?php
  class ListCoursesByStudentsNumberService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select
          c.id,
          c.name,
          c.description,
          c.period,
          c.user_id,
          c.created_at,
          c.updated_at,
          u.name as user_name,
          count(sc.student_id) as students_quantity
        from courses c
        left join users u on u.id = c.user_id
        left join student_courses sc on sc.course_id = c.id and sc.status = 1
        group by c.id,
          c.name,
          c.description,
          c.period,
          c.user_id,
          c.created_at,
          c.updated_at,
          u.name
        order by 9
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }