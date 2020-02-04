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
        <h1 class="h3 mb-0 text-gray-800">Thêm mới Tin tức</h1>
      </div>

      <!-- Content here -->
      <div class="card shadow mb-4">
        <div class="card-body">

          <?php
          if (isset($_POST['title']) && !empty($_POST['title'])) {

            require_once('./database/connect.php');

            $path = "";
            if (isset($_FILES['thumb'])) {
              $file = $_FILES['thumb'];
              $fileSave = '../upload/'.uniqid('php_').'.png';
              if (move_uploaded_file($file['tmp_name'], $fileSave)) {
                $path = $fileSave;
              }

\
            }

            $tieude       = trim(strip_tags($_POST['title']));
            $danhmuc_id = trim(strip_tags($_POST['category_id']));
            $mota = (!empty($_POST['description'])) ? trim(strip_tags($_POST['description'])) : '';
            $mota_anh = trim(strip_tags($_POST['mota_anh']));
            $noidung     = (!empty($_POST['content'])) ? trim(strip_tags($_POST['content'])) : '';
            $nguoiviet       = trim(strip_tags($_POST['nguoiviet']));

            function slugify($str) { $str = trim(mb_strtolower($str)); $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str); $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str); $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str); $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str); $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str); $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str); $str = preg_replace('/(đ)/', 'd', $str); $str = preg_replace('/[^a-z0-9-\s]/', '', $str); $str = preg_replace('/([\s]+)/', '-', $str); return $str; }
            $str = $tieude;
            $slug = slugify($str);



            // $link = trim(strip_tags($_POST['link']));

            $stmt = $conn->prepare("INSERT INTO tintuc (tieude, danhmuc_id, thumbnail, mota,mota_anh, noidung, nguoiviet, link) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sdssssss", $tieude, $danhmuc_id, $path, $mota,$mota_anh, $noidung, $nguoiviet, $slug);

            $stmt->execute();

            $stmt->close();
            $conn->close();

            header("Location: {$admin['link']['news']}");
            exit();
          }
          ?>

          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Tiêu đề</label>
              <input type="text" class="form-control" name="title" id="title" placeholder="" required="required">
            </div>
            <div class="form-group">
              <label for="cat">Danh mục</label>
              <select name="category_id" id="cat" class="form-control">
                <?php
                require_once "database/connect.php";
                $sql = "SELECT name FROM danhmuc";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) :
                  while ($row=$result->fetch_assoc()) :
                    ?>
                    <option value="1"><?php echo $row['name'] ?></option>
                    <?php
                  endwhile;
                endif;
                ?>

              </select>
            </div>
            <div class="form-group">
              <label for="thumb">Hình đại diện</label>
              <input type="file" class="form-control" name="thumb" id="thumb" placeholder="">
            </div>
            <div class="form-group">
              <label for="mota_anh">Mô tả ảnh</label>
              <input type="text" class="form-control" name="mota_anh" id="mota_anh" placeholder="" >
            </div>
            <div class="form-group">
              <label for="nv">Người viết</label>
              <input type="text" class="form-control" name="nguoiviet" id="nv" placeholder="" >
            </div>
            <div class="form-group">
              <label for="description">Mô tả</label>
              <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="content">Nội dung</label>
              <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
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
