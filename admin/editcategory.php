<?php 
require('include/header.php');

$MainCategoryID = $MainCategoryName = $description = "";

if($_SERVER["REQUEST_METHOD"] == "GET") {
    $MainCategoryID = test_input($_GET['MainCategoryID']);

    $select_sql = "SELECT * FROM `main category` where MainCategoryID = '$MainCategoryID'";
    $data = mysqli_query($conn,$select_sql);
    
    $row = mysqli_fetch_assoc($data);

    // prx($row);

    $MainCategoryID = $row['MainCategoryID'];
    $MainCategoryName = $row['MainCategoryName'];
    $description = $row['Description'];
    
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $MainCategoryName = test_input($_POST['MainCategoryName']);
    $description = test_input($_POST['description']);

    // $insert_sql = "INSERT INTO `main category`(MainCategoryName,Description) VALUES ('$MainCategoryName','$description')";

    // $isInserted = mysqli_query($conn,$insert_sql);

    // if($isInserted) {
    //     header("Location:maincategory.php");
    //     exit();
    // }
}
?>
<main id="main" class="main">

<div class="pagetitle">
  <h1>Form Elements</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item">Forms</li>
      <li class="breadcrumb-item active">Elements</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">General Form Elements</h5>

          <!-- General Form Elements -->
          <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row mb-3">
              <label for="mainCategoryID" class="col-sm-2 col-form-label">Main Category ID</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="mainCategoryID" name="mainCategoryID" value="<?php echo $MainCategoryID;?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="MainCategoryName" class="col-sm-2 col-form-label">Main Category</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="MainCategoryName" name="MainCategoryName" value="<?php echo $MainCategoryName;?>">
              </div>
            </div>
            <div class="row mb-3">
              <label for="description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
                <textarea class="form-control" style="height: 100px" id="description" name="description"><?php echo $description;?></textarea>
              </div>
            </div>           

            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Action</label>
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" name="saveBtn">Save</button>
              </div>
            </div>

          </form><!-- End General Form Elements -->

        </div>
      </div>

    </div>
  </div>
</section>
</main>
<?php require('include/footer.php'); ?>