<?php require('include/header.php');

  if(!$_SESSION['adminLogin']) {
    header("Location:index.php");
    exit();
  }
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        

      </div>
    </div>
  </section>

</main><!-- End #main -->
<?php require('include/footer.php');?>