<?php
  class ListProfessorSubjectsService {
    public static function execute($professor_id) {
      $connection = Connection::connect();

      $query = '
        select
          ps.*,
          s.name as subject_name,
          c.name as course_name
        from professor_subjects ps
        left join subjects s on s.id = ps.subject_id
        left join courses c on c.id = s.course_id
        where ps.professor_id = :professor_id
      ';

      $statement = $connection->prepare($query);
      $statement->bindValue(':professor_id', $professor_id);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }