<?php
  require_once '../database/connection.php';
  require_once '../services/professors/ListProfessorsBySubject.php';

  $professorsList = ListProfessorsBySubject::execute($_GET['subject_id']);

  $response = '';

  foreach ($professorsList as $index => $professor) {
    $response .= "<option value=\"$professor->id\">$professor->name</option>";
  }

  echo $response;