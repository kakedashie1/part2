 <?php

require_once __DIR__ . '/lib/mysqli.php';

function createLog($link,$log)
{ $sql = <<< EOT
  INSERT INTO reviews (
    title,
    author,
    content
    )
    VALUES (
      "{$log['title']}",
      "{$log['author']}",
      "{$log['content']}"
    )
EOT;

  $result = mysqli_query($link,$sql);
  if (!$result) {
    error_log('Error: fail to create review');
    error_log('Debugging Error:' . mysqli_error($link));
  }
}

function validate($log)
{
  $errors = [];
  if(!strlen($log['title'])){
    $errors['title'] = 'タイトルを入力してください';
  }elseif(strlen($log['title'] > 100)){
    $errors['title'] = 'タイトルを100文字以内で入力してください';
  }
  if(!strlen($log['author'])){
    $errors['author'] = '著者名を入力してください';
  }elseif(strlen($log['title'] > 100)){
    $errors['author'] = '著者名を100文字以内で入力してください';
  }
  if(!strlen($log['content'])){
    $errors['content'] = '感想を入力してください';
  }elseif(strlen($log['content'] > 1000)){
    $errors['content'] = '感想を1000文字以内で入力してください';
  }



  return $errors;
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $log = [
    'title' => $_POST['title'],
    'author' => $_POST['author'],
    'content' => $_POST['content'],
  ];
$errors = validate($log);
if(!count($errors)){
  $link = dbConnect();
createLog($link,$log);
mysqli_close($link);
header("Location: index.php");
}
}

$title = '読書ログの登録';
$content = __DIR__ . '/views/form.php';


include 'views/layout.php';
