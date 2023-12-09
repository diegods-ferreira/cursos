<?php
  require_once '../database/connection.php';

  class UpdateStudentService {
    public static function execute($id, $name, $cpf, $birth_date, $phone, $cell_phone) {
      $connection = Connection::connect();

      $query = '
        update students
        set name = :name,
            cpf = :cpf,
            birth_date = :birth_date,
            phone = :phone,
            cell_phone = :cell_phone,
            updated_at = current_timestamp()
        where id = :id
      ';

      $statement = $connection->prepare($query);

      $statement->bindValue(':id', $id);
      $statement->bindValue(':name', $name);
      $statement->bindValue(':cpf', $cpf);
      $statement->bindValue(':birth_date', $birth_date);
      $statement->bindValue(':phone', $phone);
      $statement->bindValue(':cell_phone', $cell_phone);

      return $statement->execute();
    }
  }