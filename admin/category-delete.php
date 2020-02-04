<?php
include 'database/connect.php';
include 'inc/config.php';
if (isset($_GET['id'])) {
  $id = $_GET['id'];
    /**
      B1: Select dữ liệu từ database xem có tồn tại ID không?
      B2: Nếu không tồn tại thì chuyển sang page danh sách
      B3: Nếu tồn tại thì xử lý xoá cho bản ghi
      B4: Chuyển sang page danh sách
    **/
      require_once "database/connect.php";
      $sql = "SELECT * FROM danhmuc WHERE id = $id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      if (!$row) {
        header("Location: {$admin['link']['category']}");
        exit();
      }else {

        $stmt = $conn->prepare("DELETE FROM danhmuc WHERE id=?");
        $stmt->bind_param("d", $id);
        $stmt->execute();
        header("Location: {$admin['link']['category']}");
        exit();
      }


}
