<?php
  class ListSubjectsNotInClassService {
    public static function execute($class_id) {
      $connection = Connection::connect();

      $query = '
        select *
        from subjects s
        where (select count(1)
              from class_subjects cs
              where cs.subject_id = s.id and cs.class_id = :class_id) = 0
      ';

      $statement = $connection->prepare($query);
      $statement->bindValue(':class_id', $class_id);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }