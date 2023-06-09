<?php

require_once __DIR__ . '/lib/mysqli.php';

function createCompany($link,$company)
{
  $sql = <<<EOT
  INSERT INTO companies(
    name,
    establishment_date,
    founder)
    VALUES (
      "{$company['name']}",
      "{$company['establishment_date']}",
      "{$company['founder']}"
      )
EOT;

$result = mysqli_query($link,$sql);
  if (!$result) {
    error_log('Error: fail to create company');
    error_log('Debugging Error:' . mysqli_error($link));

  }

}

function validate($company)
{
  $errors = [];
  if(!strlen ($company['name'])) {
    $errors['name'] = '会社名入力してください';
  }elseif
    (strlen($company['name'] > 100)) {
      $errors['name'] = '会社名はは100文字以内で入力してください';
    }
    $dates = explode('-',$company['establishment_date']);

    if(!strlen($company['establishment_date']))
    {
      $errors['establishment_date'] = '設立日を入力してください';
    }elseif(count($dates) !==3){
      $errors['establishment_date'] = '設立日を正しい形式で入力してください';
    }
    elseif(!checkdate($dates[1],$dates[2],$dates[0])){
      $errors['establishment_date'] = '設立日を正しい日にちで入力してください';
    }
    if(!strlen ($company['founder'])) {
      $errors['founder'] = '設立者名を入力してください';
    }elseif
      (strlen($company['founder'] > 100)) {
        $errors['founder'] = '設立者は100文字以内で入力してください';
      }
    return $errors;
  }



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $company = [
    'name' => $_POST['name'],
    'establishment_date' => $_POST['establishment_date'],
    'founder' => $_POST['founder']
  ];
  $errors = validate($company);
  if (!count($errors)) {
    $link = dbConnect();
    createCompany($link,$company);
    mysqli_close($link);
    header("Location: index.php");
   }

  }

  $title = '会社情報の登録';
  $content =  __DIR__ . '/views/form.php';



include 'views/layout.php';
