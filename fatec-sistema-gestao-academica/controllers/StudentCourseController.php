<?php
  require_once '../services/students/AddStudentCourseService.php';
  require_once '../services/students/AlterStudentCourseStatusService.php';
  require_once '../services/students/DeleteStudentCourseService.php';
  require_once '../services/students/VerifyIfStudentHasActiveCourse.php';

  class StudentCourseController {
    public function create() {
      $courseId = $_POST['course-id'];
      $classId = $_POST['class-id'];
      $userId = $_POST['user_id'];

      $actualStudentId = $_POST['actual-student-id'];

      $studentHasActiveCourse = VerifyIfStudentHasActiveCourse::execute($actualStudentId);

      if ($studentHasActiveCourse->dependencies !== '0') {
        header(
          "Location: ../pages/Students?page=student-courses&student_id=$actualStudentId&error=student-has-active-course"
        );

        return;
      }

      if ($courseId === '' or $classId === '' or $status === '') {
        header(
          "Location: ../pages/Students?page=student-courses&student_id=$actualStudentId&error=empty-fields"
        );

        return;
      }

      $wasStudentCourseAdded = AddStudentCourseService::execute($actualStudentId, $courseId, $classId, $userId);

      if ($wasStudentCourseAdded) {
        header(
          "Location: ../pages/Students?page=student-courses&student_id=$actualStudentId&success=course-added"
        );
      } else {
        header(
          "Location: ../pages/Students?page=student-courses&student_id=$actualStudentId&error=course-not-added"
        );
      }
    }

    public function update() {
      $id = $_POST['student_course_id'];
      $status = $_POST['status'];
      $actualStudentId = $_POST['actual-student-id'];

      $wasStudentCourseStatusAltered = AlterStudentCourseStatusService::execute($id, $status);

      if ($wasStudentCourseStatusAltered) {
        header(
          "Location: ../pages/Students?page=student-courses&student_id=$actualStudentId&success=course-status-altered"
        );
      } else {
        header(
          "Location: ../pages/Students?page=student-courses&student_id=$actualStudentId&error=course-status-not-altered"
        );
      }
    }

    public function delete() {
      $id = $_POST['id'];
      $actualStudentId = $_POST['actual-student-id'];

      $wasStudentCourseRemoved = DeleteStudentCourseService::execute($id);

      if ($wasStudentCourseRemoved) {
        header(
          "Location: ../pages/Students?page=student-courses&student_id=$actualStudentId&success=course-removed"
        );
      } else {
        header(
          "Location: ../pages/Students?page=student-courses&student_id=$actualStudentId&error=course-not-removed"
        );
      }
    }
  }

  