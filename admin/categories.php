<?php
require('include/header.php');
$CategoryID = "";
if($_SERVER["REQUEST_METHOD"] == "GET") {
    $CategoryID = test_input($_GET['CategoryID']);
    
    $delete_sql = "DELETE FROM `categories` WHERE CategoryID = '$CategoryID'";
    $isDeleted = mysqli_query($conn,$delete_sql);
    
    if($isDeleted) {
        //
    }
}

$sql = "SELECT * FROM `categories` AS cat INNER JOIN `main category` AS mcat ON cat.MainCategoryID = mcat.MainCategoryID";
$rows = mysqli_query($conn,$sql);
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

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Main Category ID</th>
                    <th scope="col">Main Category Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $srno = 1;
                  while($row = mysqli_fetch_assoc($rows)){                  
                  ?>  
                  <tr>
                    <th scope="row"><?php echo $srno;?></th>
                    <td><?php echo $row['CategoryID'];?></td>
                    <td><?php echo $row['CategoryName'];?></td>
                    <td><?php echo $row['Description'];?></td>
                    <td><?php echo $row['MainCategoryID'];?></td>
                    <td><?php echo $row['MainCategoryName'];?></td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a type="button" class="btn btn-sm btn-info" href="editcategory.php?CategoryID=<?php echo $row['CategoryID'];?>">Edit</a>
                        <a type="button" class="btn btn-sm btn-danger" href="?CategoryID=<?php echo $row['CategoryID'];?>">Delete</a>
                    </div>
                    </td>
                  </tr>
                  <?php
                  $srno++;
                  }
                  ?>
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<?php
require('include/footer.php');
?>