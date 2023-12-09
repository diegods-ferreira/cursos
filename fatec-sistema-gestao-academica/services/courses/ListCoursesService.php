<?php
  class ListCoursesService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select c.*, u.name as user_name
        from courses c
        left join users u on u.id = c.user_id
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }