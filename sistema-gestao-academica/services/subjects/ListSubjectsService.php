<?php
  class ListSubjectsService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select s.*, c.name as course_name, u.name as user_name
        from subjects s
        left join courses c on c.id = s.course_id
        left join users u on u.id = s.user_id
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }