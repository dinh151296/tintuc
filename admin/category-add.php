<?php
  define('ROOT', $_SERVER['DOCUMENT_ROOT']);

  require_once  './inc/config.php';
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
                if (isset($_POST['name']) && !empty($_POST['name'])) {

                  require_once('./database/connect.php');

                  $stmt = $conn->prepare("INSERT INTO danhmuc (name) VALUES (?)");
                  $stmt->bind_param("s", $name);


                  $name = trim(strip_tags($_POST['name']));
                  $stmt->execute();

                  $stmt->close();
                  $conn->close();

                  header("Location: {$admin['link']['category']}");
                  exit();
                }
              ?>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Tên</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="" required="required">
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
