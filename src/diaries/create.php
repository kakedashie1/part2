<?php

require_once __DIR__ . '/lib/mysqli.php';

function createDiary($link,$diary)
{
  $sql = <<<EOT
  INSERT INTO diary(
    action,
    startTime,
    endTime,
    value
    )VALUES (
    "{$diary['action']}",
    "{$diary['startTime']}",
    "{$diary['endTime']}",
    "{$diary['value']}"
    )
EOT;

$result = mysqli_query($link,$sql);
  if (!$result)
  {
    error_log('Error: fail to create diary');
    error_log('Debugging Error:' . mysqli_error($link));
  }

}






if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $diary = [
    'action' => $_POST['action'],
    'startTime' => $_POST['startTime'],
    'endTime' => $_POST['endTime'],
    'value' => $_POST['value']
  ];

  $link = dbConnect();
createDiary($link,$diary);
mysqli_close($link);

}
header("Location: index.php");
