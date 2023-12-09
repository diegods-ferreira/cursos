<?php
  class ShowStudentService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = 'select * from students where id = :id';

      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }