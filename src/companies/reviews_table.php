<?php

require_once __DIR__ . '/lib/mysqli.php';

function dropTable($link) {
  $dropTableSql = 'DROP TABLE IF EXISTS reviews';
  $result = mysqli_query($link,$dropTableSql);
  if ($result) {
    echo 'テーブルを削除しました' . PHP_EOL;
  } else {
    echo 'Error:テーブル削除に失敗しました' . PHP_EOL;
    echo 'Debugging error:' . mysqli_error($link) . PHP_EOL;

  }

}

function createTable($link) {
  $createTableSql = <<<EOT
  CREATE TABLE reviews (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
       title VARCHAR(255),
       author VARCHAR(255),
       status INTEGER(4),
       score INTEGER,
       summary VARCHAR(1000),
       created_at TIMESTAMP NOT NULL DEFAULT
       CURRENT_TIMESTAMP
EOT;
  $result = mysqli_query($link,$createTableSql);
  if ($result) {
    echo 'テーブルを作成しました' . PHP_EOL;
  } else {
    echo 'Error:テーブル作成に失敗しました' . PHP_EOL;
    echo 'Debugging error:' . mysqli_error($link) . PHP_EOL;

  }

}
$link = dbConnect();
dropTable($link);
createTable($link);
mysqli_close($link);
