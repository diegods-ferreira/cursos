<?php
  class GetClassesAbstractService {
    public static function execute() {
      $connection = Connection::connect();

      $query = '
        select
          count(c.id) as classes_number,
          group_concat(c.id, \'|\', (select count(distinct cs.subject_id) from class_subjects cs where cs.class_id = c.id)) as classes_serialized,
          date_format(max(c.updated_at), "%d/%m/%Y") as last_update
        from classes c
      ';

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetch(PDO::FETCH_OBJ);
    }
  }