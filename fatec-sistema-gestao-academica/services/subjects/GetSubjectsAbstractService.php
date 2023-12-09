<?php
  class GetSubjectsAbstractService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select
          count(s.id) as subjects_number,
          (select group_concat(su.name) from subjects su order by 1 desc limit 5) as subjects_serialized,
          date_format(max(s.updated_at), "%d/%m/%Y") as last_update
        from subjects s
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }