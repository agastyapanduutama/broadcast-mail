<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <!-- <link rel="shortcut icon" href="http://lipi.go.id/public/themes/web/assets/img/favicon/favicon.ico" type="image/x-icon" /> -->
  <meta name="baseUrl" content="<?= base_url() ?>">
  <meta name="menu" content="<?= (isset($menu)) ? $menu : null ?>">
  <meta name="token" content="<?= $this->session->userdata('token') ?>">
  <meta name="upk" content="<?= $this->session->userdata('upk') ?>">

  <title><?= $title ?> </title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/fontawasome/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/fontawasome/css/all.css">

  <!-- CSS Libraries -->
  <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/prismjs/themes/prism.css"> -->
  <link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/css/datatables.min.css" />


  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/modules/iziToast.min.css">

  <!-- Summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/summernote/summernote.min.css">

  <!-- Dropzone -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/assets/css/components.css">

  <!-- Tagify -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/tagify/tagify.css">

  <style type="text/css">
    html {
      scroll-behavior: smooth;
    }

    .tagify__dropdown.users-list .tagify__dropdown__item {
      padding: .5em .7em;
      display: grid;
      grid-template-columns: auto 1fr;
      gap: 0 1em;
      grid-template-areas: "avatar name"
        "avatar email";
    }

    .tagify__dropdown.users-list .tagify__dropdown__item:hover .tagify__dropdown__item__avatar-wrap {
      transform: scale(1.2);
    }

    .tagify__dropdown.users-list .tagify__dropdown__item__avatar-wrap {
      grid-area: avatar;
      width: 36px;
      height: 36px;
      border-radius: 50%;
      overflow: hidden;
      background: #EEE;
      transition: .1s ease-out;
    }

    .tagify__dropdown.users-list img {
      width: 100%;
      vertical-align: top;
    }

    .tagify__dropdown.users-list strong {
      grid-area: name;
      width: 100%;
      align-self: center;
    }

    .tagify__dropdown.users-list span {
      grid-area: email;
      width: 100%;
      font-size: .9em;
      opacity: .6;
    }

    .tagify__dropdown.users-list .addAll {
      border-bottom: 1px solid #DDD;
      gap: 0;
    }


    /* Tags items */
    .tagify__tag {
      white-space: nowrap;
    }

    .tagify__tag:hover .tagify__tag__avatar-wrap {
      transform: scale(1.6) translateX(-10%);
    }

    .tagify__tag .tagify__tag__avatar-wrap {
      width: 16px;
      height: 16px;
      white-space: normal;
      border-radius: 50%;
      margin-right: 5px;
      transition: .12s ease-out;
    }

    .tagify__tag img {
      width: 100%;
      vertical-align: top;
    }

    #myBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 30px;
      z-index: 99;
      font-size: 18px;
      border: none;
      outline: none;
      background-color: #555;
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 4px;
    }

    #myBtn:hover {
      background-color: #00b7c2;
    }

    .dropdown-list .dropdown-list-content:not(.is-end):after {
      height: 0px;
    }

    ::-webkit-scrollbar {
      width: 5px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: transparent;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #6777EF;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #6777EF;
    }
  </style>


  <script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js"></script>

</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
        </form>
        <ul class="navbar-nav navbar-right">


          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <!-- <img alt="image" src="<?= base_url() ?>assets/admin/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
              <div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama_user'); ?></div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">


              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="#" id="btnKeluar" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Keluar
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Broadcast Mail</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">BM</a>
          </div>
          <ul class="sidebar-menu">

            <li class="menu-header">Menu</li>

            <li class="nav-item dropdown">
              <a href="<?= base_url('admin/dashboard') ?>" class="nav-link">
                <i class="fas fa-columns"></i> <span>Dashboard</span></a>
            </li>


            <?php if ($_SESSION['level'] == 1) : ?>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Master</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('admin/anggota') ?>">Data Anggota</a></li>
                  <li><a href="<?= base_url('admin/jabatan') ?>">Data Jabatan</a></li>
                  <li><a href="<?= base_url('admin/pangkat') ?>">Data Pangkat</a></li>
                  <li><a href="<?= base_url('admin/kategori') ?>">Data Kategori</a></li>
                  <li><a href="<?= base_url('admin/user') ?>">Data User</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-cogs"></i> <span>Pengaturan</span></a>
                <ul class="dropdown-menu">
                  <li><a href="<?= base_url('admin/konfigurasi') ?>">Konfigurasi Email</a></li>
                </ul>
              </li>
            <?php endif ?>

            <li class="nav-item dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-bullhorn"></i> <span>Broadcast</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= base_url('admin/mail/pilih') ?>">Buat Broadcast</a></li>
                <li><a href="<?= base_url('admin/mail/riwayat') ?>">Riwayat Broadcast</a></li>
              </ul>
            </li>






        </aside>
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1><?= $title ?></h1>
          </div>

          <?php require 'content.php'; ?>

        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; <?= date('Y') ?> <div class="bullet"></div> Powered By <a href="https://www.instagram.com/informatik.id/">Informatik.id | Repositori Karya LIPI</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->

  <!-- <script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js"></script> -->
  <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url() ?>assets/js/moment.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/assets/js/stisla.js"></script>



  <!-- DataTables  & Plugins -->
  <script type="text/javascript" src="<?= base_url() ?>assets/js/datatables.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/jszip/jszip.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url() ?>assets/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>



  <!-- <script src="<?= base_url() ?>assets/admin/node_modules/prismjs/prism.js"></script> -->
  <!-- JS Libraies -->

  <!-- Sweet Alert -->
  <script src="<?= base_url() ?>assets/modules/iziToast.min.js"></script>
  <script src="<?= base_url() ?>assets/modules/sweetalert.min.js"></script>

  <!-- Summernote -->
  <script src="<?= base_url() ?>assets/summernote/summernote-bs4.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/summernote.min.js"></script> -->

  <!-- Tagify -->
  <script src="<?= base_url() ?>assets/tagify/jQuery.tagify.min.js"></script>
  <script src="<?= base_url() ?>assets/tagify/tagify.min.js"></script>

  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets/admin/assets/js/scripts.js"></script>
  <script src="<?= base_url() ?>assets/admin/assets/js/custom.js"></script>
  <script src="<?= base_url() ?>assets/admin/assets/js/page/bootstrap-modal.js"></script>
  <script src="<?= base_url() ?>assets/js/page/admin.js"></script>
  <script src="<?= base_url() ?>assets/js/page/<?= (isset($script)) ? $script : "" ?>.js"></script>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>

  <!-- <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script> -->

  <script>
    $('#summernote').summernote({
      height: 300,
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
    });
  </script>




</body>

</html>