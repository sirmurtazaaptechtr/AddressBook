<?php 
require('include/header.php');

$customerName = $contactName = $address = $city = $postCode = $country = $photo = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerName = test_input($_POST['customerName']);
    $contactName = test_input($_POST['contactName']);
    $address = test_input($_POST['address']);
    $city = test_input($_POST['city']);
    $postCode = test_input($_POST['postCode']);
    $country = test_input($_POST['country']);

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    }

    $photo = $target_file;
    

    if($uploadOk) {
        $insert_sql = "INSERT INTO `customers` (`CustomerName`, `ContactName`, `Address`, `City`, `PostalCode`, `Country`, `Photo`) VALUES ('$customerName', '$contactName', '$address', '$city', '$postCode', '$country', '$photo');";

        $isInserted = mysqli_query($conn,$insert_sql);

        if($isInserted) {
            header("Location:maincategory.php");
            exit();
        }
    }
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
          <form class="row g-3 needs-validation" novalidate method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <div class="row mb-3">
              <label for="customerName" class="col-sm-2 col-form-label">Customer Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="customerName" name="customerName">
              </div>
            </div>
            <div class="row mb-3">
              <label for="contactName" class="col-sm-2 col-form-label">Contact Name</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="contactName" name="contactName">
              </div>
            </div>
            <div class="row mb-3">
              <label for="address" class="col-sm-2 col-form-label">Address</label>
              <div class="col-sm-10">
                <textarea class="form-control" style="height: 100px" id="address" name="address"></textarea>
              </div>
            </div>
            <div class="row mb-3">
              <label for="city" class="col-sm-2 col-form-label">City</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="city" name="city">
              </div>
            </div>
            <div class="row mb-3">
              <label for="postCode" class="col-sm-2 col-form-label">Postal Code</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="postCode" name="postCode">
              </div>
            </div>
            <div class="row mb-3">
              <label for="country" class="col-sm-2 col-form-label">Country</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="country" name="country">
              </div>
            </div>
            <div class="row mb-3">
                  <label for="fileToUpload" class="col-sm-2 col-form-label">Photo</label>
                  <div class="col-sm-10">
                    <input class="form-control" type="file" id="fileToUpload" name="fileToUpload">
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