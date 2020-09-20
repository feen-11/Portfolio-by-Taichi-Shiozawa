<?php

require_once(__DIR__ . '/../lib/Controller/UserEdit.php');

$index = new UserEdit();
$index->run();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー情報の変更</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header class="header">
      <div class="container  d-flex align-items-center justify-content-between">
        <h2 class="col-4">ワンフレーズ</h2>
        <div class="row col-5 justify-content-between">
          <li class="">ログイン中のユーザー：<a href="userShow.php"><?php echo $_SESSION['me']['name'] ?></a></li>
          <form action="logout.php" method="post" id="logout">
            <div class="btn-primary btn col-" onclick="document.getElementById('logout').submit();">ログアウト</div>
            </form>
          </div>
        </div>
  </header>
  <main>
    <div class="user-edit">
      <div class="container">
        <div class="user-edit-form">
          <div class="text-center mx-auto col-sm-12 col-md-8">
            <h2>ユーザー情報の変更</h2>
            <form action="" method="post" id="editUser">
              <div class="user-name-edit row justify-content-between">
                <p class="col-sm-12 col-md-4">ユーザー名</p>
                <input class="col-sm-12 col-md-8" type="text" name="name" placeholder="name" value="<?php echo $_SESSION['me']['name'] ?>">
              </div>
              <div class="user-email-edit row justify-content-between">
                <p class="col-sm-12 col-md-4">メールアドレス</p>
                <input class="col-sm-12 col-md-8" type="text" name="email" placeholder="email" value="<?php echo $_SESSION['me']['email'] ?>">
              </div>
              <div class="justify-content-between col-sm-12 col-md-6 mx-auto">
                <div class="btn btn-primary" onclick="document.getElementById('editUser').submit();">更新</div>
              </form>
              <a  class="btn btn-primary"href="index.php">戻る</a>
              </div>
              
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>