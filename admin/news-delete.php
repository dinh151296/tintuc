<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

require_once './inc/config.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
    /**
      B1: Select dữ liệu từ database xem có tồn tại ID không?
      B2: Nếu không tồn tại thì chuyển sang page danh sách
      B3: Nếu tồn tại thì xử lý xoá cho bản ghi
      B4: Chuyển sang page danh sách
    **/
      $sql = "SELECT * FROM tintuc WHERE id = $id";
      require_once "database/connect.php";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();


      if (!$row) {
       header("Location: {$admin['link']['news']}");
       exit();
     }else {

      $stmt = $conn->prepare("DELETE FROM tintuc WHERE id = ?");
      $stmt->bind_param("d", $id);
      $stmt->execute();
      unlink('../upload/' . $row['thumbnail']);
      header("Location: {$admin['link']['news']}");
      exit();


    }
  }

