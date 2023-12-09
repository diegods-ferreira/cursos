<?php
  class GetProfessorsAbstractService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select
          count(p.id) as professors_number,
          (select group_concat(pr.name) from professors pr order by 1 desc limit 5) as professors_serialized,
          date_format(max(p.updated_at), "%d/%m/%Y") as last_update
        from professors p
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }