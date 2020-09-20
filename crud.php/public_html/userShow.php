<?php

require_once(__DIR__ . '/../lib/Controller/UserShow.php');

$app = new UserShow();
$app->run();
$posts = $app->readUserPosts();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $_SESSION['me']['name']?>さんのアカウント情報 - 一言日記ならワンフレーズ</title>
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

    <div class="user-show">
      <div class="container">
        <div class="user-info container">
          <h2>プロフィール</h2>
          <div class="container user-info-show">
            <p class="">ユーザー名：<?php echo $_SESSION['me']['name'] ?></p>
            <p>メールアドレス：<?php echo $_SESSION['me']['email'] ?></p>
            <div class="row justify-content-center">
              <a class="btn btn-primary edit-link" href="userEdit.php">編集する</a>
            </div>
          </div>
        </div>
        <div class="user-post">
          <div class="container">
            <h2>過去の投稿</h2>
            <div class="container">
              <div class="posts">
                <?php foreach($posts as $post):?>
                  <div class="post">
                    <li class="body" id="<?php echo $post['id']?>"><?php echo $post['body']?></li> 
                    <a href="show.php?id=<?php echo $post['id']?>">詳細</a>
                  </div>
                  <?php endforeach ;?>
                </div>
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