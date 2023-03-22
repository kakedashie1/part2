<?php
require_once __DIR__ . '/lib/mysqli.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $diary = [
    'action' => $_POST['action'],
    'startTime' => $_POST['startTime'],
    'endTime' => $_POST['endTime'],
    'value' => $_POST['value']
  ];
}
var_dump($diary);
