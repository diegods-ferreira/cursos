<?php
  class ListStudentsService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select s.*, date_format(s.birth_date, "%d/%m/%Y") as birth_date_formatted, u.name as user_name
        from students s
        left join users u on u.id = s.user_id
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }