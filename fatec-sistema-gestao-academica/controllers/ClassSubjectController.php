<?php
  require_once '../services/classes/AddClassSubjectService.php';
  require_once '../services/classes/DeleteClassSubjectService.php';

  class ClassSubjectController {
    public function create() {
      $subjectId = $_POST['subject-id'];
      $professorId = $_POST['professor-id'];

      $actualClassId = $_POST['actual-class-id'];

      if ($subjectId === '' or $professorId === '') {
        header(
          "Location: ../pages/Classes?page=class-subjects&class_id=$actualClassId&error=empty-fields"
        );

        return;
      }

      $wasClassSubjectAdded = AddClassSubjectService::execute($actualClassId, $subjectId, $professorId);

      if ($wasClassSubjectAdded) {
        header(
          "Location: ../pages/Classes?page=class-subjects&class_id=$actualClassId&success=subject-added"
        );
      } else {
        header(
          "Location: ../pages/Classes?page=class-subjects&class_id=$actualClassId&error=subject-not-added"
        );
      }
    }

    public function delete() {
      $id = $_POST['id'];
      $actualClassId = $_POST['actual-class-id'];

      $wasClassSubjectRemoved = DeleteClassSubjectService::execute($id);

      if ($wasClassSubjectRemoved) {
        header(
          "Location: ../pages/Classes?page=class-subjects&class_id=$actualClassId&success=subject-removed"
        );
      } else {
        header(
          "Location: ../pages/Classes?page=class-subjects&class_id=$actualClassId&error=subject-not-removed"
        );
      }
    }
  }

  