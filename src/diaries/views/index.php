<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>日記一覧</title>
</head>
<body>
  <header>
    <h1>
      <a href="/diaries/index.php">日記</a>
    </h1>
  </header>
  <a href="/diaries/new.php">日記を登録する</a>
  <main>
    <?php if(count($diaries) > 0) : ?>
    <?php foreach ($diaries as $diary) : ?>
      <section>
        <h2>
          <?php echo $diary['action']; ?>
        </h2>
        <h3>
          <?php echo $diary['startTime']; ?>
        </h3>
        <h3>
          <?php echo $diary['endTime']; ?>
        </h3>
        <h3>
          <?php echo $diary['value']; ?>
        </h3>
      </section>
    <?php endforeach ; ?>
    <?php else : ?>
      <p>日記が登録されていません</p>

    <?php endif ; ?>
  </main>
</body>
</html>
