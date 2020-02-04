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
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

          <!-- Content here -->

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include('./inc/footer.php'); ?>
