<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stylesheets/css/app.css">
  <title><?php echo $title ?></title>
</head>
<body>

  <div class="container">
  <header class="navbar shadow-sm p-3 mb-5 bg-white">
    <h1 class="h2 text-dark mt-4 mb-4">
      <a href="/diaries/index.php" class="text-body text-decoration-none">日記</a>
    </h1>
  </header>
    <?php include $content; ?>
  </div>


</body>
</html>
