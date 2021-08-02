<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>CRUD APP</title>

	<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.25/datatables.min.css"/>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>

<style type="text/css">

  .opration-button button,.opration-button a{

    float: right;
  }


  .table-responsive a{

    font-size: 19px;
  }

</style>
<body>



  <nav class="navbar navbar-expand-md navbar-dark  bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">&nbsp; CRUD App</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="#">contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link " href="#">Blog</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



<!-- info app line -->
  <div class="container">
    <div class="row">
      <div class="cl-lg-12">
        <h5 class="text-center text-dark my-4">CRUD App use OOP and PDO and Ajax</h5>
      </div>
    </div>
  </div>
<!-- info app line -->


  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <p class="m-1 text-secondary">All User In Database</p>
      </div>

      <div class="col-lg-6 opration-button">
        <button  type="button" class="btn btn-primary btn-sm m-1" data-toggle="modal" data-target="#AddUserModal"><i class="fa fa-user-plus"></i>&nbsp; Add new user</button>
        <a href="#" class="btn btn-success btn-sm m-1">Export to Excel</a>
      </div>
    </div>
    <hr class="my-1" style="color: #ccc;">


    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive" id="showUser" >



        </div>
      </div>
    </div>
  </div>






  <!-- Add user Modal -->

    <!-- The Modal -->
  <div class="modal" id="AddUserModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body px-4">
          <form method="post" action="" id="form-data">
            <div class="form-group">
              <input type="text" class="form-control my-3" name="fname" placeholder="First Name" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control my-3" name="lname" placeholder="Last Name" required>
            </div>

            <div class="form-group">
              <input type="email" class="form-control my-3" name="email" placeholder="Email Address" required>
            </div>

            <div class="form-group">
              <input type="tel" class="form-control my-3" name="phone" placeholder="Phone Number" required>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-success"  id="insert-btn" name="insert-btn" value="Add user" required>
            </div>

          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>














    <!-- update user Modal -->

    <!-- The Modal -->
  <div class="modal" id="EditUserModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Update User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body px-4">
          <form method="post" action="" id="edit-form-data">
            <input type="hidden" name="id" id="id">
            <div class="form-group">
              <input type="text" class="form-control my-3" name="fname" id="fname" required>
            </div>

            <div class="form-group">
              <input type="text" class="form-control my-3" name="lname" id="lname" required>
            </div>

            <div class="form-group">
              <input type="email" class="form-control my-3" name="email" id="email" required>
            </div>

            <div class="form-group">
              <input type="tel" class="form-control my-3" name="phone" id="phone" required>
            </div>

            <div class="form-group">
              <input type="submit" class="btn btn-success"  id="update-btn" name="update-btn" value="Update user" required>
            </div>

          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
<?php include_once 'jsFiles.js';?>
</body>
</html>