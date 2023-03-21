<?php
require_once __DIR__ . '/lib/mysqli.php';
require_once __DIR__ . '/lib/escape.php';

function listBooks($link)
{
  $books = [];
  $sql = 'SELECT title,author,content FROM reviews;';
  $results = mysqli_query($link,$sql);
  while($book = mysqli_fetch_assoc($results))
  {
    $books[] = $book;
  }

  mysqli_free_result($results);
  return $books;

}

$link = dbConnect();
$books = listBooks($link);

$title = '読書ログの一覧';
$content = __DIR__ . '/views/index.php';



include __DIR__ .  '/views/layout.php';
