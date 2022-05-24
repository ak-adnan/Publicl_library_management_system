<?php
require('dbconn.php');
?>

<?php 
if ($_SESSION['RollNo']) {
    ?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e3d8f46d80.js" crossorigin="anonymous"></script>
    <link href="css/style.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 " href="#">
            <img src="images/logo.jpg" alt="" width="140" height="35" class="d-inline-block align-text-top">
      </a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3 fs-6" href="logout.php">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link fs-5" href="index.php">
              <span ><i class="fa-solid fa-house-user"></i></span>
              Home
            </a>
          </li>

          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="student.php">
              <span data-feather="file"></span>
              Library Users
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active fs-5" href="book.php">
              All Books
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="addbook.php">
              Add BooK
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="issue_requests.php">
              Book Issue Request
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-5" href="current.php">
              Issued Books
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 mb-2">Public Library Management System</h1>
      </div>
      <div>
    <center>

              <br>
              <?php
                    if(isset($_POST['submit']))
                        {$s=$_POST['title'];
                            $sql="select * from LMS.book where BookId='$s' or Title like '%$s%'";
                        }
                    else
                        $sql="select * from LMS.book";

                    $result=$conn->query($sql);
                    $rowcount=mysqli_num_rows($result);

                    if(!($rowcount))
                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                    else
                    {

                    
            ?>
            <table class="table" id = "tables">
                        <thead>
                        <tr>
                            <th>Book id</th>
                            <th>Book name</th>
                            <th>Availability</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                
                //$result=$conn->query($sql);
                while($row=$result->fetch_assoc())
                {
                    $bookid=$row['BookId'];
                    $name=$row['Title'];
                    $avail=$row['Availability'];
                
                
                ?>
                <tr>
                    <td><?php echo $bookid ?></td>
                    <td><?php echo $name ?></td>
                    <td><b><?php echo $avail ?></b></td>
                    <td><center>
                        <a href="edit_book_details.php?id=<?php echo $bookid; ?>" class="btn btn-success">Edit</a>
                    </center></td>
                </tr>
            <?php }} ?>
            </tbody>
            </table>
        </div>

          </center> 

        </div>
      </div>
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


</body>

</html>

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>