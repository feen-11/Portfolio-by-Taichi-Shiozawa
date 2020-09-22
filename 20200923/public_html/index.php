<?php

require_once(__DIR__ . '/../lib/Controller/Index.php');
require_once(__DIR__ . '/../config/config.php');


$app = new Index();
$app->run();
$posts = $app->readPosts();

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>みんなの日報 - 一言日記ならワンフレーズ</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <div class="index">
    <header class="header">
      <div class="container  d-flex align-items-center justify-content-between">
        <h2 class="col-4">ワンフレーズ</h2>
        <div class="row col-5 justify-content-between">
          <li class="">ログイン中のユーザー：<a href="userShow.php"><?php echo $_SESSION['me']['name'] ?></a></li>
          <form action="logout.php" method="post" id="logout">
            <div class="btn-primary btn col-" onclick="document.getElementById('logout').submit();">ログアウト</div>
            <input type="hidden" name="token" value="<?= h($_SESSION['token'])?>">
            </form>
          </div>
        </div>
      </header>
      <main>
        <div class="container">
          <div class="post-create">
            <h2>みんなの日報</h2>
            <form class="" action="" method="post" id="create">
              <textarea class="form-control" name="body" id="" placeholder="今何してる？"></textarea>
              <input type="hidden" name="token" value="<?= h($_SESSION['token'])?>">
            </form>
            <div class="btn btn-primary" onclick="document.getElementById('create').submit();">つぶやく</div>
            <p class="err"><?= h($app->getErrors('token'));?></p>
            <p class="err"><?= h($app->getErrors('empty'));?></p>
            <p class="err"><?= h($app->getErrors('over'));?></p>
          </div>
          <div class="post-read">
            <ul>
              <?php foreach($posts as $post):?>
                <div class="posts">    
                  <?php $user = $app->readUser($post['userId']);?>
                  <li class="user-name">投稿者：<?php echo $user['name'] ?></li>
                  <p class="post body" id="<?php echo $post['id']?>"><?php echo $post['body']?></p> 
                  <a href="show.php?id=<?php echo $post['id']?>">詳細</a>
            </div>
            <?php endforeach ;?>
          </ul>
        </div>
      </div>
    </main>
  </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
  </html>