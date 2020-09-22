<?php

require_once(__DIR__ . '/../lib/Controller/Login.php');

$app = new Login();
$app->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン - 一言日記ならワンフレーズ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="login-php">
  <article class="login title">
    <div class="container">
        <h2 class="text-left">ワンフレーズへようこそ！</h2>
        <p class="text-left">初めての方は<a href="signup.php">こちら</a>からアカウント登録してください。</p>
    </div>
  </article>
  
  <section class="login login-form container ">
    <h3>ログイン</h3>
    <div class="col-sm-12 col-md-8 mx-auto">
      <form action="" method="post" id="login" >
        <div class="mx-auto">
          <div class="email row justify-content-between ">
            <p class="my-auto col-sm-12 col-md-4">メールアドレス</p>
            <input class="col-sm-12 col-md-8" type="text" name="email" placeholder="your@example.com">
            <p class="err"><?= h($app->getErrors('email'));?></p>
          </div>
          <div class="password row justify-content-between">
            <p class="my-auto col-sm-12 col-md-4">パスワード</p>
            <input class="col-sm-12 col-md-8" type="password" name="password" placeholder="password">
            <p class="err"><?= h($app->getErrors('password'));?></p>
          </div>
        </div>
        <p class="err"><?= h($app->getErrors('unmatch'));?></p>
        <p class="err"><?= h($app->getErrors('token'));?></p>
          <div class="btn-primary btn login-btn" onclick="document.getElementById('login').submit();">ログイン</div>
          <input type="hidden" name="token" value="<?= h($_SESSION['token'])?>">
        </form>
      </div>
      <a href="signup.php" class="signup-link">初めての方はこちら</a>
  </section>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</div>

</body>
</html>