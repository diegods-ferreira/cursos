<?php
  class GetCoursesAbstractService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select
          count(c.id) as courses_number,
          (select group_concat(co.name) from courses co order by 1 desc limit 5) as courses_serialized,
          date_format(max(c.updated_at), "%d/%m/%Y") as last_update
        from courses c
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }