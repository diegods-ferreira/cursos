<?php
  class ListProfessorsService {
    public static function execute() {
      $connection = Connection::connect();

      $query = "
        select
          p.*,
          u.name as user_name,
          group_concat(distinct ps.subject_id) as subjects_id_list,
          group_concat(distinct concat(\"'\", s.name, \"|\", c.name, \"'\")) as subjects_serialized
        from professors p
        left join professor_subjects ps on ps.professor_id = p.id
        left join subjects s on s.id = ps.subject_id
        left join courses c on c.id = s.course_id
        left join users u on u.id = p.user_id
        group by p.id, p.name, p.title, p.user_id, p.created_at, p.updated_at, u.name
        ";

      $statement = $connection->prepare($query);
      $statement->execute();

      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }