<?php

require_once __DIR__ . '/lib/mysqli.php';

function dropTable($link) {
  $dropTableSql = 'DROP TABLE IF EXISTS diary';
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
  CREATE TABLE diary (
      id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
      action VARCHAR(25),
      startTime TIME NOT NULL,
      endTime TIME NOT NULL,
      value VARCHAR(10),
      created_at TIMESTAMP NOT NULL DEFAULT
    CURRENT_TIMESTAMP

      ) DEFAULT CHARACTER SET=utf8mb4;
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
