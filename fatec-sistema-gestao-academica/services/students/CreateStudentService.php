<?php
  require_once '../database/connection.php';

  class CreateStudentService {
    public static function execute($name, $cpf, $birth_date, $phone, $cell_phone, $userId) {
      $connection = Connection::connect();

      $query = '
        insert into students (name, cpf, birth_date, phone, cell_phone, user_id) values (:name, :cpf, :birth_date, :phone, :cell_phone, :user_id)
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':name', $name);
      $statement->bindValue(':cpf', $cpf);
      $statement->bindValue(':birth_date', $birth_date);
      $statement->bindValue(':phone', $phone);
      $statement->bindValue(':cell_phone', $cell_phone);
      $statement->bindValue(':user_id', $userId);

      return $statement->execute();
    }
  }