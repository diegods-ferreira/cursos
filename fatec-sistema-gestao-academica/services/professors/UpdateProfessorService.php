<?php
  require_once '../database/connection.php';

  class UpdateProfessorService {
    public static function execute($id, $name, $title, $subjects) {
      $connection = Connection::connect();

      $connection->beginTransaction();

      // Updating the professor into the PROFESSORS table.
      $query = '
        update professors
        set name = :name,
            title = :title,
            updated_at = current_timestamp()
        where id = :id
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':id', $id);
      $statement->bindValue(':name', $name);
      $statement->bindValue(':title', $title);

      $professorUpdated = $statement->execute();

      // Deleting all professor's subjects from the PROFESSOR_SUBJECTS table.
      $query = 'delete from professor_subjects where professor_id = :professor_id';

      $statement = $connection->prepare($query);

      $statement->bindValue(':professor_id', $id);

      $statement->execute();

      // Re-inserting the professor's subjects into the PROFESSOR_SUBJECTS table.
      $subjectsInserted = true;

      if (count($subjects) > 0) {
        foreach ($subjects as $index => $subject_id) {
          if (!$subjectsInserted) {
            break;
          }
  
          $query = 'insert into professor_subjects (professor_id, subject_id) values (:professor_id, :subject_id)';
  
          $statement = $connection->prepare($query);
  
          $statement->bindValue(':professor_id', $id);
          $statement->bindValue(':subject_id', $subject_id);
  
          $subjectsInserted = $statement->execute();
        }
      }

      if ($professorUpdated and $subjectsInserted) {
        $connection->commit();
        return true;
      } else {
        $connection->rollBack();
        return false;
      }
    }
  }