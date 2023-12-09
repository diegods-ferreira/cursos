<?php
  class ListProfessorsBySubject {
    public static function execute($subject_id) {
      $connection = Connection::connect();

      $query = "
        select p.*
        from professor_subjects ps
        left join professors p on p.id = ps.professor_id
        where ps.subject_id = :subject_id
      ";

      $statement = $connection->prepare($query);
      $statement->bindValue(':subject_id', $subject_id);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }