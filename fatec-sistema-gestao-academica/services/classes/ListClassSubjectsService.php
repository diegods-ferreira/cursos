<?php
  class ListClassSubjectsService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = '
        select
        cs.*,
          s.name as subject_name,
          c.name as course_name,
          p.name as professor_name
        from class_subjects cs
        left join subjects s on s.id = cs.subject_id
        left join courses c on c.id = s.course_id
        left join professors p on p.id = cs.professor_id
        where cs.class_id = :id
      ';

      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }