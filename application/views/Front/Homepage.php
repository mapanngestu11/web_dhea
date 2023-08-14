<!DOCTYPE html>
<html lang="en">

<?php include 'Part/Head.php';?>

<body>
  <!-- Spinner Start -->
  <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
  </div>
  <!-- Spinner End -->

  <!-- Navbar Start -->
  <?php include 'Part/Navbar.php';?>
  <!-- Navbar End -->

  <!-- Carousel Start -->
  <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <?php 
          foreach ($banner->result_array() as $data) {
           $gambar = $data['gambar'];
           ?>
           <img class="w-100" src="<?php echo base_url() . "assets/upload/"; ?><?php echo $gambar;?>" alt="Image" />
         <?php } ?>
         <div class="carousel-caption">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-12 col-lg-10">

              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- Carousel End -->

<!-- About Start -->
<div class="container-xxl py-5">
  <div class="container">
    <div class="row g-5">
      <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
        <div
        class="position-relative overflow-hidden ps-5 pt-5 h-100"
        style="min-height: 400px"
        >
        <img
        class="position-absolute w-100 h-100"
        src="<?php echo base_url() . "assets/Front/"; ?>img/about.jpg"
        alt=""
        style="object-fit: cover"
        />
        <div
        class="position-absolute top-0 start-0 bg-white pe-3 pb-3"
        style="width: 200px; height: 200px"
        >
        <div
        class="d-flex flex-column justify-content-center text-center bg-primary h-100 p-3"
        >
        <img src="<?php echo base_url() . "assets/Front/img/logo tangkot.png"; ?>">
      </div>
    </div>
  </div>
</div>
<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
  <div class="h-100">
    <div class="border-start border-5 border-primary ps-4 mb-5">
      <h6 class="text-body text-uppercase mb-2">Informasi Website</h6>
      <h1 class="display-6 mb-0">
        Permohonan Surat
      </h1>
    </div>
    <p>
     Website permohonan surat merupakan platform digital yang dirancang untuk memfasilitasi proses pengajuan surat-surat resmi atau permohonan secara online.
   </p>
   <p class="mb-4">
    Fungsi utamanya adalah untuk meningkatkan efisiensi, kenyamanan, dan aksesibilitas dalam mengajukan surat atau permohonan kepada instansi yang berwenang. 
  </p>
  <div class="border-top mt-4 pt-4">
    <div class="row g-4">
      <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.1s">
        <i
        class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
        ></i>
        <h6 class="mb-0">Kemudahan Akses</h6>
      </div>
      <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.3s">
        <i
        class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
        ></i>
        <h6 class="mb-0">Efisiensi Proses</h6>
      </div>
      <div class="col-sm-4 d-flex wow fadeIn" data-wow-delay="0.5s">
        <i
        class="fa fa-check fa-2x text-primary flex-shrink-0 me-3"
        ></i>
        <h6 class="mb-0">Dokumentasi Digital</h6>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<!-- About End -->

<!-- Footer Start -->
<?php include 'Part/Footer.php';?>
<!-- JavaScript Libraries -->
<?php include 'Part/Js.php';?>
</body>
</html>
