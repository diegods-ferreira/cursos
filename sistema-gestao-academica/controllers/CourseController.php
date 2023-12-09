<?php
  require_once '../services/courses/CreateCourseService.php';
  require_once '../services/courses/UpdateCourseService.php';
  require_once '../services/courses/DeleteCourseService.php';
  require_once '../services/courses/CountCourseSubjectsService.php';
  require_once '../services/courses/CountStudentsInCourseService.php';

  class CourseController {
    public function create() {
      $name = $_POST['name'];
      $description = $_POST['description'];
      $period = $_POST['period'];
      $userId = $_POST['user_id'];

      $actualReport = $_POST['actual_report'];

      if ($name === '' or $description === '') {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasCourseCreated = CreateCourseService::execute($name, $description, $period, $userId);

      if ($wasCourseCreated) {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=course-created'
        );
      } else {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=course-not-created'
        );
      }
    }

    public function update() {
      $id = $_POST['id'];
      $name = $_POST['name'];
      $description = $_POST['description'];
      $period = $_POST['period'];

      $actualReport = $_POST['actual_report'];

      if ($name === '' or $description === '') {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=empty-fields'
        );

        return;
      }

      $wasCourseUpdated = UpdateCourseService::execute($id, $name, $description, $period);

      if ($wasCourseUpdated) {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=course-updated'
        );
      } else {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=course-not-updated'
        );
      }
    }

    public function delete() {
      $courseId = $_POST['id'];
      $actualReport = $_POST['actual_report'];

      $courseDependencies = CountCourseSubjectsService::execute($courseId);

      if ($courseDependencies->dependencies) {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=course-has-subjects'
        );
        return;
      }

      $courseDependencies = CountStudentsInCourseService::execute($courseId);

      if ($courseDependencies->dependencies) {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=course-has-students'
        );
        return;
      }

      $wasCourseDeleted = DeleteCourseService::execute($courseId);

      if ($wasCourseDeleted) {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'success=course-deleted'
        );
      } else {
        header(
          'Location: ../pages/Courses?' .
          ($actualReport !== '' ? "report=$actualReport&" : '') .
          'error=course-not-deleted'
        );
      }
    }
  }

  