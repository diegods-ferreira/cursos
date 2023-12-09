<?php
  class GetStudentsAbstractService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select
          count(s.id) as students_number,
          (select group_concat(st.name) from students st order by 1 desc limit 5) as students_serialized,
          date_format(max(s.updated_at), "%d/%m/%Y") as last_update
        from students s
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }