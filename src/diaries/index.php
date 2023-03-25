<?php

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

include  __DIR__ . '/views/index.php';
