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
