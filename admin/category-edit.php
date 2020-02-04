<?php
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

require_once './inc/config.php';
?>

<?php include('./inc/header.php'); ?>

<!-- Sidebar -->
<?php include('./inc/sidebar.php'); ?>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <?php include('./inc/topbar.php'); ?>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm mới Danh mục</h1>
      </div>

      <!-- Content here -->
      <div class="card shadow mb-4">
        <div class="card-body">

          <?php

          if (isset($_GET['id'])) {
            $id = $_GET['id'];
                  /**
                    B1: Select dữ liệu từ database xem có tồn tại ID không?
                    B2: Nếu không tồn tại thì chuyển sang page danh sách
                    B3: Nếu tồn tại thì xử lý update cho bản ghi
                    B4: Chuyển sang page danh sách
                  **/
                    $sql = "SELECT * FROM danhmuc WHERE id=$id";
                    require_once "database/connect.php";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    if (!$row) {
                     header("Location: {$admin['link']['category']}");
                     exit();
                   } elseif (isset($_POST['name']) && !empty($_POST['name'])) {

                  // require_once('./database/connect.php');
                  // $name = $_POST['name'];
                  // $qr = "UPDATE danhmuc SET name=$name";
                  // $conn->query($qr);


                  $name = trim(strip_tags($_POST['name']));

                  $stmt = $conn->prepare("UPDATE danhmuc SET name=? WHERE id=?");
                  $stmt->bind_param("sd", $name, $id);
                  $stmt->execute();

                  $stmt->close();
                  $conn->close();

                  header("Location: {$admin['link']['category']}");
                  exit();
                }
              }
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Tên</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="" value="<?php echo $row['name'] ?>">
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>

            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php include('./inc/footer.php'); ?>
