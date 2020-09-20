<?php
require_once(__DIR__ . '/../lib/Controller/Show.php');

$app = new Show();
$app->run();
$showPost= $app->showPost();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿詳細 - 一言日記ならワンフレーズ</title>
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
    <div class="show-post">
      <div class="container">
            <?php $user =$app->readUser($showPost['userId']);?>
            <p class="user-name">投稿者：<?php echo $user['name'] ?></p>
            <p class="body"><?php echo $showPost['body']?></p>
            <div class="row">
              <p class="created col-sm-12 col-md-6">投稿日時：<?php echo $showPost['created']?></p>
              <p class="updated col-sm-12 col-md-6">更新日時：<?php echo $showPost['updated']?></p>
            </div>
        </div>
    </div>
    <?php if($_SESSION['me']['userId'] === $showPost['userId']):?>
      <div class="edit-post">
        <div class="container">
          <form action="" method="post" id="update">
            <textarea class="form-control" name="body" id="" cols="30" rows="10"><?php echo $showPost['body']?></textarea>
            <div class="row justify-content-end">
              <div class="btn btn-primary update" onclick="document.getElementById('update').submit();">編集</div>
              </form>
              <form action="" method="post" id="delete">
              <div class="btn btn-primary" onclick="document.getElementById('delete').submit();">削除</div>
          </div>
        </form>
        <?php endif;?>
      </div> 
        <div class="row justify-content-center">
            <a class="btn btn-primary" href="index.php">戻る</a>
        </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>