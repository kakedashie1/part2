<?php

require_once __DIR__ . '/lib/escape.php';
require_once __DIR__ . '/lib/mysqli.php';

function listDiaries($link)
{
  $diaries = [];
  $sql = 'SELECT action,startTime,endTime,value FROM diary;';
  $results = mysqli_query($link,$sql);

  while ($diary = mysqli_fetch_assoc($results))
  {
    $diaries[] = $diary;
  }
  mysqli_free_result($results);

  return $diaries;
}

$link = dbConnect();
$diaries = listDiaries($link);

$title = '日記の一覧';
$content = __DIR__ . '/views/index.php';


include __DIR__ . '/views/layout.php';
