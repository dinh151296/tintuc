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
        <h1 class="h3 mb-0 text-gray-800">Tin tức</h1>
      </div>

      <!-- Content here -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">
            <a href="<?php echo $admin['link']['news_add'] ?>">Thêm mới</a>
          </h6>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="w100">ID</th>
                  <th>Ảnh đại diện</th>
                  <th>Tiêu đề</th>
                  <th>Danh mục</th>
                  <th>Mô tả</th>
                  <th class="w120">Xử lý</th>
                </tr>
              </thead>
              <tbody>

                <?php
                require_once('./database/connect.php');

                $sql = "SELECT id, thumbnail, link, mota, tieude, danhmuc_id FROM tintuc ORDER BY id DESC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) :
                  while($row = $result->fetch_assoc()) :
                    $danhmuc_id = $row['danhmuc_id'];
                    ?>
                    <tr>
                      <td><?php echo $row["id"]; ?></td>
                      <td>
                        <img class="img-fluid w50 h50" src="<?php echo  '../upload/' . $row["thumbnail"] ?>">
                      </td>
                      <td><?php echo $row["tieude"]; ?></td>
                      <?php
                      $qr = "SELECT name FROM tintuc INNER JOIN danhmuc ON tintuc.danhmuc_id=danhmuc.id WHERE danhmuc.id=$danhmuc_id";
                      $res = $conn->query($qr);
                      $item = $res->fetch_assoc();
                      ?>
                      <td><?php echo $item["name"]; ?></td>
                      <td><?php echo $row["mota"]; ?></td>
                      <td>
                        <a href="<?php echo $admin['link']['news_edit'] . $row["id"] ?>" class="text-info">SỬA</a>
                        |
                        <a href="<?php echo $admin['link']['news_del'] . $row["id"] ?>" class="text-danger">XOÁ</a>
                      </td>
                    </tr>
                    <?php
                  endwhile;
                endif;
                $conn->close();
                ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- End of Main Content -->

  <?php include('./inc/footer.php'); ?>
