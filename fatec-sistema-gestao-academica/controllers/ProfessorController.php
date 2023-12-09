<?php
  require_once '../services/professors/CreateProfessorService.php';
  require_once '../services/professors/UpdateProfessorService.php';
  require_once '../services/professors/DeleteProfessorService.php';
  require_once '../services/professors/CountProfessorClassesService.php';

  class ProfessorController {
    public function create() {
      $name = $_POST['name'];
      $title = $_POST['title'];
      $subjects = $_POST['subjects'];
      $userId = $_POST['user_id'];

      $actualReport = $_POST['actual_report'];

      if ($name === '') {
        header(
          'Location: ../pages/Professors?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasProfessorCreated = CreateProfessorService::execute($name, $title, $subjects, $userId);

      if ($wasProfessorCreated) {
        header(
          'Location: ../pages/Professors?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=professor-created'
        );
      } else {
        header(
          'Location: ../pages/Professors?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=professor-not-created'
        );
      }
    }

    public function update() {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $title = $_POST['title'];
      $subjects = $_POST['subjects'];

      $actualReport = $_POST['actual_report'];

      if ($name === '') {
        header(
          'Location: ../pages/Professors?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasProfessorUpdated = UpdateProfessorService::execute($id, $name, $title, $subjects);

      if ($wasProfessorUpdated) {
        header(
          'Location: ../pages/Professors?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=professor-updated'
        );
      } else {
        header(
          'Location: ../pages/Professors?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=professor-not-updated'
        );
      }
    }

    public function delete() {
      $professorId = $_POST['id'];
      $actualReport = $_POST['actual_report'];

      $professorDependencies = CountProfessorClassesService::execute($professorId);

      if ($professorDependencies->dependencies) {
        header(
          'Location: ../pages/Professors?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=professor-has-classes'
        );
        return;
      }

      $wasProfessorDeleted = DeleteProfessorService::execute($professorId);

      if ($wasProfessorDeleted) {
        header(
          'Location: ../pages/Professors?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=professor-deleted'
        );
      } else {
        header(
          'Location: ../pages/Professors?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=professor-not-deleted'
        );
      }
    }
  }

  