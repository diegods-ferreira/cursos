<?php
  require_once '../database/connection.php';

  class CreateProfessorService {
    public static function execute($name, $title, $subjects, $userId) {
      $connection = Connection::connect();

      $connection->beginTransaction();

      // Inserting the professor into the PROFESSORS table.
      $query = '
        insert into professors (name, title, user_id) values (:name, :title, :user_id)
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':name', $name);
      $statement->bindValue(':title', $title);
      $statement->bindValue(':user_id', $userId);

      $professorCreated = $statement->execute();

      // Retrieving the professor that was just created.
      $query = 'select * from professors where name = :name and title = :title and user_id = :user_id';

      $statement = $connection->prepare($query);

      $statement->bindValue(':name', $name);
      $statement->bindValue(':title', $title);
      $statement->bindValue(':user_id', $userId);

      $statement->execute();

      $professor = $statement->fetch(PDO::FETCH_OBJ);

      // Inserting the professor's subjects into the PROFESSOR_SUBJECTS table.
      $subjectsInserted = true;

      if (count($subjects) > 0) {
        foreach ($subjects as $index => $subject_id) {
          if (!$subjectsInserted) {
            break;
          }
  
          $query = 'insert into professor_subjects (professor_id, subject_id) values (:professor_id, :subject_id)';
  
          $statement = $connection->prepare($query);
  
          $statement->bindValue(':professor_id', $professor->id);
          $statement->bindValue(':subject_id', $subject_id);
  
          $subjectsInserted = $statement->execute();
        }
      }

      if ($professorCreated and $subjectsInserted) {
        $connection->commit();
        return true;
      } else {
        $connection->rollBack();
        return false;
      }
    }
  }