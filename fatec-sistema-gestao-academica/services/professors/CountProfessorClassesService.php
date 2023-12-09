<?php
  class CountProfessorClassesService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = '
        select count(1) as dependencies
        from class_subjects cs
        where cs.professor_id = :id
      ';

      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }