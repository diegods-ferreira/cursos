<?php
  require_once '../services/subjects/CreateSubjectService.php';
  require_once '../services/subjects/UpdateSubjectService.php';
  require_once '../services/subjects/DeleteSubjectService.php';
  require_once '../services/subjects/CountSubjectProfessorsService.php';
  require_once '../services/subjects/CountSubjectClassesService.php';

  class SubjectController {
    public function create() {
      $name = $_POST['name'];
      $workload = $_POST['workload'];
      $courseId = $_POST['course_id'];
      $summary = $_POST['summary'];
      $userId = $_POST['user_id'];

      $actualReport = $_POST['actual_report'];

      if ($name === '' or $workload === '' or $summary === '') {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasSubjectCreated = CreateSubjectService::execute($name, $workload, $summary, $courseId, $userId);

      if ($wasSubjectCreated) {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=subject-created'
        );
      } else {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=subject-not-created'
        );
      }
    }

    public function update() {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $workload = $_POST['workload'];
      $summary = $_POST['summary'];
      $courseId = $_POST['course_id'];

      $actualReport = $_POST['actual_report'];

      if ($name === '' or $workload === '' or $summary === '') {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasSubjectUpdated = UpdateSubjectService::execute($id, $name, $workload, $summary, $courseId);

      if ($wasSubjectUpdated) {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=subject-updated'
        );
      } else {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=subject-not-updated'
        );
      }
    }

    public function delete() {
      $subjectId = $_POST['id'];
      $actualReport = $_POST['actual_report'];

      $subjectDependencies = CountSubjectProfessorsService::execute($subjectId);

      if ($subjectDependencies->dependencies) {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=subject-has-professors'
        );
        return;
      }

      $subjectDependencies = CountSubjectClassesService::execute($subjectId);

      if ($subjectDependencies->dependencies) {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=subject-has-classes'
        );
        return;
      }

      $wasSubjectDeleted = DeleteSubjectService::execute($subjectId);

      if ($wasSubjectDeleted) {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=subject-deleted'
        );
      } else {
        header(
          'Location: ../pages/Subjects?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=subject-not-deleted'
        );
      }
    }
  }

  