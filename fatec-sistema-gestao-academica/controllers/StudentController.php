<?php
  require_once '../services/students/CreateStudentService.php';
  require_once '../services/students/UpdateStudentService.php';
  require_once '../services/students/DeleteStudentService.php';

  class StudentController {
    public function create() {
      $name = $_POST['name'];
      $cpf = $_POST['cpf'];
      $birth_date = $_POST['birth_date'];
      $phone = $_POST['phone'];
      $cell_phone = $_POST['cell_phone'];
      $userId = $_POST['user_id'];

      $actualReport = $_POST['actual_report'];

      if ($name === '' or $cpf === '' or $birth_date === '') {
        header(
          'Location: ../pages/Students?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasStudentCreated = CreateStudentService::execute($name, $cpf, $birth_date, $phone, $cell_phone, $userId);

      if ($wasStudentCreated) {
        header(
          'Location: ../pages/Students?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=student-created'
        );
      } else {
        header(
          'Location: ../pages/Students?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=student-not-created'
        );
      }
    }

    public function update() {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $cpf = $_POST['cpf'];
      $birth_date = $_POST['birth_date'];
      $phone = $_POST['phone'];
      $cell_phone = $_POST['cell_phone'];

      $actualReport = $_POST['actual_report'];

      if ($name === '' or $cpf === '' or $birth_date === '') {
        header(
          'Location: ../pages/Students?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasStudentUpdated = UpdateStudentService::execute($id, $name, $cpf, $birth_date, $phone, $cell_phone);

      if ($wasStudentUpdated) {
        header(
          'Location: ../pages/Students?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=student-updated'
        );
      } else {
        header(
          'Location: ../pages/Students?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=student-not-updated'
        );
      }
    }

    public function delete() {
      $studentId = $_POST['id'];
      $actualReport = $_POST['actual_report'];

      $wasStudentDeleted = DeleteStudentService::execute($studentId);

      if ($wasStudentDeleted) {
        header(
          'Location: ../pages/Students?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=student-deleted'
        );
      } else {
        header(
          'Location: ../pages/Students?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=student-not-deleted'
        );
      }
    }
  }

  