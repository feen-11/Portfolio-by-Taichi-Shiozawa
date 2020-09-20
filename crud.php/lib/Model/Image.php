<?php


require_once(__DIR__ . '/Model.php');

class Image extends Model{

  public function createImage(){
    $sql = "insert into images (image_name, image_type, image_content, image_size, userId) values (:image_name, :image_type, :image_content, :image_size, :userId)";
    $stmt = $this->dbh->prepare($sql);
    $stmt->execute([
      ':image_name' => $_POST['image_name'],
      ':image_type' => $_POST['image_type'],
      ':image_content' => $_POST['image_content'],
      ':image_size' => $_POST['image_size'],
      ':userId' => $_SESSION['me']['userId']
      ]);
  }


}
?>