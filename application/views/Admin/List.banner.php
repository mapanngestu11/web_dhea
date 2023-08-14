<!DOCTYPE html>
<html lang="en">

<?php include 'Part/Head.php';?>
<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'Part/Sidebar.php';?>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <?php include 'Part/Topbar.php';?>
        <!-- Topbar -->
        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><span class="badge badge-primary">Data Banner</span></h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Admin/Homepage/') ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Banner</li>
            </ol>
          </div>

          <!-- Row -->
          <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Banner</h6>



                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Nama</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                       <th>No</th>
                       <th>Gambar</th>
                       <th>Judul</th>
                       <th>Nama</th>
                       <th>Action</th>
                     </tr>
                   </tfoot>
                   <tbody>
                    <?php
                    $no = 0;
                    foreach ($banner->result_array() as $row) :

                      $no++;
                      $id_banner           = $row['id_banner'];
                      $gambar = $row['gambar'];
                      $judul     = $row['judul'];
                      $nama_lengkap = $row['nama_user'];
                      ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td><img src="<?php echo base_url() . "assets/upload/"; ?><?php echo $gambar;?>" style="width: 150px;"></td>
                        <td><?php echo $judul ?></td>
                        <td><?php echo $nama_lengkap ?></td>
                        <td>
                          <div class="form-button-action">
                            <a class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-target="#ModalEdit<?php echo $id_banner; ?>"><span class="fa fa-edit" style="color:white;"></span></a>
                          </div>
                        </td>
                      <?php endforeach; ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
          <!--Row-->

          <!-- Documentation Link -->


        </div>
        <!---Container Fluid-->
      </div>


      <!-- modal edit -->
      <?php foreach ($banner->result_array() as $row) :
        $id_banner = $row['id_banner'];
        $nama_lengkap = $row['nama_user'];

        ?>
        <div class="modal fade " id="ModalEdit<?php echo $id_banner; ?>" role="dialog" aria-hidden="true" data-backdrop="static">
          <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel1">Update Data Banner</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                  <i data-feather="x"></i>
                </button>
              </div>
              <style>
                .form-input {
                  padding-top: 5px;
                }
              </style>

              <div class="modal-body">
                <div class="modal-body">
                  <form action="<?php echo base_url() . 'Admin/Banner/update'; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-12">
                        <label>Judul</label>
                        <div class="form-group form-input">
                          <input type="text" name="judul" value="<?php echo $row['judul']; ?>" class="form-control" required>
                          <input type="hidden" name="id_banner" value="<?php echo $row['id_banner'];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <label>Gambar</label>
                        <div class="form-group form-input">
                          <input type="file" name="gambar" class="form-control" required="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label>Nama Lengkap</label>
                        <div class="form-group form-input">
                          <?php 
                          $nama_lengkap = $this->session->userdata('nama_lengkap'); ?>
                          
                          <input type="text" name="nama_user" class="form-control form-input" value="<?php echo $nama_lengkap;?>" readonly>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Batal</span>
                  </button>
                  <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Simpan</span>
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <!-- end modal -->
      <!-- Footer -->
      <?php include 'Part/Footer.php';?>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php include 'Part/Js.php';?>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>

  <!-- msg -->
  <?php if ($this->session->flashData('msg') == 'warning') : ?>
    <script type="text/javascript">
      Swal.fire({
        type: 'warning',
        title: 'Perhatian !',
        heading: 'Success',
        text: "Data Sudah ada .",
        showHideTransition: 'slide',
        icon: 'warning',
        hideAfter: false,
        bgColor: '#7EC857'
      });
    </script>

    <?php elseif ($this->session->flashData('msg') == 'success') : ?>
      <script type="text/javascript">
        Swal.fire({
          type: 'success',
          title: 'Sukses',
          heading: 'Success',
          text: "Data Berhasil Di Tambahkan.",
          showHideTransition: 'slide',
          icon: 'success',
          hideAfter: false,
          bgColor: '#7EC857'
        });
      </script>
      <?php elseif ($this->session->flashData('msg') == 'info-update') : ?>
        <script type="text/javascript">
          Swal.fire({
            type: 'success',
            title: 'Sukses',
            heading: 'Success',
            text: "Data Berhasil Di Update.",
            showHideTransition: 'slide',
            icon: 'success',
            hideAfter: false,
            bgColor: '#7EC857'
          });
        </script>
        <?php elseif ($this->session->flashData('msg') == 'success-hapus') : ?>
          <script type="text/javascript">
            Swal.fire({
              type: 'success',
              title: 'Sukses',
              heading: 'Success',
              text: "Data Berhasil dihapus.",
              showHideTransition: 'slide',
              icon: 'success',
              hideAfter: false,
              bgColor: '#7EC857'
            });
          </script>
          <?php else : ?>

          <?php endif; ?>

        </body>

        </html>