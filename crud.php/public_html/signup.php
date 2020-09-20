<?php

require_once(__DIR__ . '/../lib/Controller/Signup.php');

$user = new Signup();
$user->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>新規登録 - 一言日記ならワンフレーズ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="signup-php">
    <article class="signup title">
      <div class="container">
        <h2>ようこそ「ワンフレーズ」へ</h2>
        <p>初めての方はユーザー登録をしてください。任意のニックネーム、メールアドレス、パスワードの三つが必要です。</p>
      </div>
  </article>

    <div class="container signup-form mx-auto text-center">
      <h2 class="">新規ユーザー登録</h2>
      <div class="col-sm-12 col-md-8 mx-auto">
        <form class="" action="" method="post" id="signup">
          <div class="row justify-content-between">
            <p class="col-sm-12 col-md-4">ユーザー名</p>
            <input class="col-sm-12 col-md-8" type="text" name="name" placeholder="username">
          </div>
          <div class="row justify-content-between">
            <p class="col-sm-12 col-md-4">メールアドレス</p>
            <input class="col-sm-12 col-md-8" type="text" name="email" placeholder="your@example.com">
          </div>
          <div class="row justify-content-between">
            <p class="col-sm-12 col-md-4">パスワード</p>
            <input class="col-sm-12 col-md-8" type="password" name="password" placeholder="password">
          </div>
          <div class="btn-primary btn " onclick="document.getElementById('signup').submit();">登録</div>
        </form>
        <a href="login.php" class="">登録済みの方はこちら</a>
      </div>
    </div>
  </div>

  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>