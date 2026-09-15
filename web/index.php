<?php
ini_set('display_errors', 1);  error_reporting(E_ALL); session_start(); 


include_once '../lib/helpers.php';
include_once '../view/partials/head.php';
?>
<body>
  <div class="wrapper">

    <?php include_once '../view/partials/sidebar.php'; ?>

    <div class="main-panel">

      <?php include_once '../view/partials/navbar.php'; ?>

      <div class="container">
        <div class="page-inner">
          <?php
          if (isset($_GET['modulo'])) {
              resolve();
          } else {
              include_once '../view/partials/content.php';
          }
          ?>
        </div>
      </div>

      <?php include_once '../view/partials/footer.php'; ?>

    </div>
  </div>

  <?php include_once '../view/partials/scripts.php'; ?>
</body>
</html>
