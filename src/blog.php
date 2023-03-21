<?php
require_once __DIR__ . '/lib/mysqli.php';

function validate ($review)
{
  $errors = [];

  if (!strlen($review['title'])){
    $errors['title'] = '書籍名を入力してください';
  }elseif (strlen($review['title']) > 255) {
    $errors['title'] = '書籍名は255文字以内で入力してください';
   }
   if ($review['score'] < 1 || $review['score'] > 5 ) {
    $errors['score'] = '1~5点で評価してください';
   }
   if (!strlen($review['content'])){
    $errors['content'] = '内容を入力してください';
   }elseif (strlen($review['content']) > 1000) {
    $errors['content'] = '1000文字以内で入力してください';
   }

   return $errors;

}

function createBlog($link)
{
  $review = [];
  echo '日記を作成してください' . PHP_EOL;
  echo 'タイトル:' ;
  $review['title'] = trim(fgets(STDIN));
  echo '日時:' ;
  $review['day'] = trim(fgets(STDIN));
  echo '内容:' ;
  $review['content'] = trim(fgets(STDIN));
  echo '評価(1~5点):' ;
  $review['score'] = (int) trim(fgets(STDIN));

$validated = validate($review);
if (count($validated) > 0) {
  foreach ($validated as $error) {
      echo $error . PHP_EOL;
  }

  return;
}



$sql = <<<EOT
INSERT INTO diary (
  title ,
  created_at,
  content,
  score
  ) VALUES (
    "{$review['title']}",
    "{$review['day']}",
    "{$review['content']}",
    "{$review['score']}"
  )

EOT;

$result = mysqli_query($link,$sql);
if ($result) {
  echo 'データを追加しました' . PHP_EOL;
} else {
  echo 'Error:データの追加にしっぱいしました' . PHP_EOL;
  echo 'Debugging error:' . mysqli_error($link) . PHP_EOL;

}
}

function showBlog()
{
  $link = mysqli_connect('db','book_log','pass','book_log');

if (!$link) {
  echo 'Error:データベースに接続できませんでした' . PHP_EOL;
  echo 'Debugging error:' . mysqli_connect_error() . PHP_EOL;
  exit;
}
  $sql = 'SELECT title, content FROM diary';
$results = mysqli_query($link, $sql);

while ($blog = mysqli_fetch_assoc($results)) {

  echo 'タイトル:' . $blog['title'] . PHP_EOL;
  echo '内容:' . $blog['content'] . PHP_EOL;

}
  mysqli_free_result($results);
}

function dbConnect()
{
  $link = mysqli_connect('db','book_log','pass','book_log');

if (!$link) {
  echo 'Error:データベースに接続できませんでした' . PHP_EOL;
  echo 'Debugging error:' . mysqli_connect_error() . PHP_EOL;
  exit;
}

// echo 'データベースに接続できました' . PHP_EOL;

return $link;
}


// $blogs = [];

$link = dbConnect();

while (true) {
  echo '1.日記を作成 ' . PHP_EOL;
echo '2.日記を表示 ' . PHP_EOL;
echo '9.アプリケーションを終了 ' . PHP_EOL;
echo '番号を選択してください (1,2,9) ' . PHP_EOL;
$num = trim(fgets(STDIN));


if ($num === '1') {
          createBlog($link);

}elseif($num === '2') {
         showBlog();

}elseif($num==='9') {
  mysqli_close($link);
  break;

}


}
