<?php
  $location = $_POST['location'];
  unset($_POST['location']);

  $report = $_POST['report'];
  unset($_POST['report']);

  $anotherQueryParams = '';

  foreach ($_POST as $index => $param) {
    $anotherQueryParams .= "&$index=$param";
  }

  header("Location: $location?report=$report$anotherQueryParams");