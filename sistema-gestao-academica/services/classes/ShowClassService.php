<?php
  class ShowClassService {
    public static function execute($id) {
      $connection = Connection::connect();

      $query = 'select * from classes where id = :id';

      $statement = $connection->prepare($query);
      $statement->bindValue(':id', $id);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }