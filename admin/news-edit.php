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
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa tin tức</h1>
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
                    $sql = "SELECT id FROM tintuc WHERE id = $id";
                    require_once "database/connect.php";
                    $resultId = $conn->query($sql);
                    $rowId = $resultId->fetch_assoc();
                    if (!$rowId) {
                      header("Location: {$admin['link']['news']}");
                      exit();
                    }
                    elseif (isset($_POST['title']) && !empty($_POST['title'])) {

                      require_once('./database/connect.php');



                      $tieude       = trim(strip_tags($_POST['title']));
                      $category_id = trim(strip_tags($_POST['category_id']));
                        // $thumb       = (!empty($_POST['thumb'])) ? trim(strip_tags($_POST['thumb'])) : '';
                      $path =  $_POST['thumb_saved'];
                      if (isset($_FILES['thumb'])) {
                        $file = $_FILES['thumb'];
                        if ($file == "") {
                          $fileSave = $path;
                        }else {
                          $fileSave = uniqid('php_').'.png';
                          if (move_uploaded_file($file['tmp_name'], '../upload/'.$fileSave)) {
                            $path = $fileSave;

                            unlink('../upload/' . $_POST['thumb_saved']);
                          }
                        }
                      }
                      $description = (!empty($_POST['description'])) ? trim(strip_tags($_POST['description'])) : '';
                      $content     = (!empty($_POST['content'])) ? trim(strip_tags($_POST['content'])) : '';
                      $nguoiviet       = trim(strip_tags($_POST['nguoiviet']));

                      // function slugify($str) { $str = trim(mb_strtolower($str)); $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str); $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str); $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str); $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str); $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str); $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str); $str = preg_replace('/(đ)/', 'd', $str); $str = preg_replace('/[^a-z0-9-\s]/', '', $str); $str = preg_replace('/([\s]+)/', '-', $str); return $str; }
                      // $str = $tieude;
                      // $slug = slugify($str);

                      $link = trim(strip_tags($_POST['link']));

                      $stmt = $conn->prepare("UPDATE tintuc SET tieude=?, mota=?, thumbnail=?, link=?, noidung=?, nguoiviet=?, danhmuc_id=? WHERE id=?");
                      $stmt->bind_param("ssssssdd", $tieude,$description,$path, $link, $content,$nguoiviet, $category_id,     $id);
                      $stmt->execute();

                      $stmt->close();
                      $conn->close();

                      header("Location: {$admin['link']['news']}");
                      exit();
                    }
                  }
                  ?>

                  <?php
                  if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT tieude, thumbnail, link, mota, noidung, danhmuc_id, nguoiviet FROM tintuc WHERE id=$id";
                    require_once('./database/connect.php');
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();


                    ?>
                    <form action="" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="title">Tiêu đề</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="" value="<?php echo $row['tieude']; ?>" >
                      </div>
                      <div class="form-group">
                        <label for="cat">Danh mục</label>
                        <select name="category_id" id="cat" class="form-control">
                          <?php
                          require_once "database/connect.php";
                          $sql = "SELECT  name FROM danhmuc";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) :
                            while ($item=$result->fetch_assoc()) :
                             ?>
                             <option value="1">
                              <?php echo $item['name'] ?>
                            </option>
                            <?php
                          endwhile;
                        endif;
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="thumb">Hình đại diện</label>
                      <input type="file" class="form-control" name="thumb" id="thumb" placeholder="" value="">
                      <input type="hidden" name="thumb_saved" value="<?php echo $row['thumbnail'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="nv">Người viết</label>
                      <input type="text" class="form-control" name="nguoiviet" id="nv" placeholder="" value="<?php echo $row['nguoiviet'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="link">Link</label>
                      <input type="text" class="form-control" name="link" id="link"  value="<?php echo $row['link']; ?>" >
                    </div>
                    <div class="form-group">
                      <label for="description">Mô tả</label>
                      <textarea name="description" id="description" cols="30" rows="10" class="form-control" type="text">
                        <?php echo $row['mota']; ?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <label for="content">Nội dung</label>
                      <textarea name="content"  id="editor" cols="30" rows="10" class="form-control" type="text">
                        <?php echo $row['noidung']; ?>
                      </textarea>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                  </form>
                  <?php
                }
                ?>


              </div>
            </div>

          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php include('./inc/footer.php'); ?>
        <script src="../ckeditor/ckeditor.js"></script>
        <script type="text/javascript">

          var appURL = "http://news.local";

          var ckeditorOpts = {
           extraPlugins: 'font,colorbutton,justify,colordialog',
           height: '600px',
           // Define the toolbar groups as it is a more accessible solution.
           toolbarGroups: [
           {"name":"basicstyles","groups":["basicstyles"]},
           {"name":"links","groups":["links"]},
           {"name":"paragraph","groups":["list","blocks", "align"]},
           {"name":"document","groups":["mode"]},
           {"name":"insert","groups":["insert"]},
           {"name":"styles","groups":["styles"]},
           {"name":"colors", "groups": [ 'TextColor', 'BGColor' ]},
               // {"name":"about","groups":["about"]}
               ],
           // colorButton_enableMore: true,
           // colorButton_enableAutomatic: true,
           coreStyles_italic: { element: 'i', overrides: 'em' },
           // Remove the redundant buttons from toolbar groups defined above.
           removeButtons: 'Subscript,Superscript,Anchor,Specialchar,Flash,Smiley,SpecialChar',
           filebrowserBrowseUrl: appURL+'/ckfinder/ckfinder.html',
           // filebrowserImageBrowseUrl: appURL+'/ckfinder/ckfinder.html?type=Images',
           // filebrowserFlashBrowseUrl: appURL+'/ckfinder/ckfinder.html?type=Flash',
           filebrowserUploadUrl: appURL+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
           // filebrowserImageUploadUrl: appURL+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
           // filebrowserFlashUploadUrl: appURL+'/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'

         }

         if ($('#editor').length) {
           CKEDITOR.replace( 'editor', ckeditorOpts );
       } //end if
     </script>