<?php
require('include/header.php');
$CustomerID = "";
if($_SERVER["REQUEST_METHOD"] == "GET") {
    $CustomerID = test_input($_GET['CustomerID']);
    
    $delete_sql = "DELETE FROM `customers` WHERE CustomerID = '$CustomerID'";
    $isDeleted = mysqli_query($conn,$delete_sql);
    
    if($isDeleted) {
        //
    }
}

$sql = "SELECT * FROM `customers`";
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
                    <th scope="col">Photo</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Contact Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Postal Code</th>
                    <th scope="col">Country</th>
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
                    <td><img src="<?php echo $row['Photo'];?>" alt="<?php echo $row['ContactName'];?>" height="30"></td>
                    <td><?php echo $row['ContactName'];?></td>
                    <td><?php echo $row['CustomerName'];?></td>
                    <td><?php echo $row['Address'];?></td>
                    <td><?php echo $row['City'];?></td>
                    <td><?php echo $row['PostalCode'];?></td>
                    <td><?php echo $row['Country'];?></td>
                    <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a type="button" class="btn btn-sm btn-info" href="editcustomer.php?CustomerID=<?php echo $row['CustomerID'];?>">Edit</a>
                        <a type="button" class="btn btn-sm btn-danger" href="?CustomerID=<?php echo $row['CustomerID'];?>">Delete</a>
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