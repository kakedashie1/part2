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
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>日記の登録</title>
</head>
<body>
  <h1>日記の登録</h1>
  <form action="create.php" method="post">
    <?php if(count($errors)) : ?>
      <ul>
        <?php foreach ($errors as $error) : ?>
          <li><?php echo $error; ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
    <div>
      <label for="action">行動</label>
      <input type="text" id="action" name="action" value="">
    </div>
    <div>
      <p>
      <label for="">開始時間</label>
      <input type="time" name="startTime">
      </p>
      <p>
      <label for="">終了時間</label>
      <input type="time" name="endTime">
      </p>


    </div>
    <div>
      <p>満足度<br>
      <label for="5">大満足</label>
      <input type="radio"id="5" name="value" value="5" checked>
      <label for="4">満足</label>
      <input type="radio" id="4" name="value" value="4">
      <label for="3">普通</label>
      <input type="radio" id="3" name="value" value="3">
      <label for="2">やや不満</label>
      <input type="radio" id="2" name="value" value="2">
      <label for="1">不満</label>
      <input type="radio" id="1" name="value" value="1">
      </p>

    </div>
    <button type="submit">登録する</button>

  </form>

</body>
</html>
