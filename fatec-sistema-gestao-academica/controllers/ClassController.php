<?php
  require_once '../services/classes/CreateClassService.php';
  require_once '../services/classes/UpdateClassService.php';
  require_once '../services/classes/DeleteClassService.php';
  require_once '../services/classes/CountStudentsInClassService.php';

  class ClassController {
    public function create() {
      $description = $_POST['description'];
      $userId = $_POST['user_id'];

      $actualReport = $_POST['actual_report'];

      if ($description === '') {
        header(
          'Location: ../pages/Classes?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasClassCreated = CreateClassService::execute($description, $userId);

      if ($wasClassCreated) {
        header(
          'Location: ../pages/Classes?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=class-created'
        );
      } else {
        header(
          'Location: ../pages/Classes?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=class-not-created'
        );
      }
    }

    public function update() {
      $id = $_POST['id'];
      $description = $_POST['description'];

      $actualReport = $_POST['actual_report'];

      if ($description === '') {
        header(
          'Location: ../pages/Classes?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasClassUpdated = UpdateClassService::execute($id, $description);

      if ($wasClassUpdated) {
        header(
          'Location: ../pages/Classes?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=class-updated'
        );
      } else {
        header(
          'Location: ../pages/Classes?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=class-not-updated'
        );
      }
    }

    public function delete() {
      $classId = $_POST['id'];
      $actualReport = $_POST['actual_report'];

      $classDependencies = CountStudentsInClassService::execute($classId);

      if ($classDependencies->dependencies) {
        header(
          'Location: ../pages/Classes?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=class-has-students'
        );
        return;
      }

      $wasClassDeleted = DeleteClassService::execute($classId);

      if ($wasClassDeleted) {
        header(
          'Location: ../pages/Classes?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=class-deleted'
        );
      } else {
        header(
          'Location: ../pages/Classes?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=class-not-deleted'
        );
      }
    }
  }

  