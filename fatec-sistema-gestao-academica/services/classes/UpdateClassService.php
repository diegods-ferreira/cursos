<?php
  require_once '../database/connection.php';

  class UpdateClassService {
    public static function execute($id, $description) {
      $connection = Connection::connect();

      $query = '
        update classes
        set description = :description,
            updated_at = current_timestamp()
        where id = :id
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':id', $id);
      $statement->bindValue(':description', $description);

      return $statement->execute();
    }
  }