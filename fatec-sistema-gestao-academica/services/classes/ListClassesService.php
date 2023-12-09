<?php
  class ListClassesService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select c.*, u.name as user_name, count(distinct sc.id) as students_number
        from classes c
        left join student_courses sc on sc.class_id = c.id
        left join users u on u.id = c.user_id
        group by c.id, c.description, c.user_id, c.created_at, c.updated_at, u.name
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }