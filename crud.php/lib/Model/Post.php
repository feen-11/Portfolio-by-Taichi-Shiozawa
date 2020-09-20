<?php


require_once(__DIR__ . '/Model.php');

class Post extends Model{
  public function create(){
    $sql = "insert into posts (body, created, updated, userId) values (:body, now(), now(), :userId)";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':body' => $_POST['body'],
      ':userId' => $_SESSION['me']['userId']
      ]);
    header('Location: SITE_URL');
  }

  public function read(){
    $sql = "select * from posts order by id desc";
    $stmt = $this->dbh->query($sql);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function show($id){
    $sql = "select * from posts where id = :id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':id' => $id
    ]);
    return $stmt->fetch(\PDO::FETCH_ASSOC);
  }

  public function delete($id){
    $sql = "delete from posts where id = :id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':id' => $id
    ]);
    echo "${id}の投稿を削除しました。";
  }

  public function update($id){
    $sql = "update posts set body = :body, updated = now() where id = :id";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':body' => $_POST['body'],
      ':id' => $id
    ]);
  }

  public function readMyPosts(){
    $sql = "select * from posts where userId = :userId";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':userId' => $_SESSION['me']['userId']
    ]);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

}
?>