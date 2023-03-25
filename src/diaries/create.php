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

function validate($diary)
{
  $errors = [];
  if(!strlen($diary['action']))
  {
    $errors['action'] = '行動を入力してください';
  }elseif(strlen($diary['action']) > 100)
  {
    $errors['action'] = '行動を100文字以内で入力してください';
  }
  if(!strlen($diary['startTime']))
  {
    $errors['startTime'] = '開始時間を入力してください';

}
  if(!strlen($diary['endTime']))
  {
    $errors['endTime'] = '終了時間を入力してください';

}

return $errors;

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $diary = [
    'action' => $_POST['action'],
    'startTime' => $_POST['startTime'],
    'endTime' => $_POST['endTime'],
    'value' => $_POST['value']
  ];

  $errors = validate($diary);
  if (!count($errors)) {
    $link = dbConnect();
    createDiary($link,$diary);
    mysqli_close($link);
    header("Location: index.php");

  }


}
$title = '日記の登録';
$content = 'views/form.php';

include 'views/layout.php';
