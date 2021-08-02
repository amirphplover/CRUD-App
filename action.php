<?php

include_once "database.php";
$db = new Dbh;

if (isset($_POST["action"]) && $_POST["action"] == "view") {

	$outPut = '';
	$data = $db->getAllUser();
	$i = 0;

	if ($db->TotalRowCount() > 0) {
		$outPut .= '

      <table class="table table-striped table-sm table-bordered" >
              <thead>
                <tr class="text-center">
                  <th>ID</th>
                  <th>First name</th>
                  <th>Last name</th>
                  <th>E-mail</th>
                  <th>Phone</th>
                  <th>Action</th>
                </tr>
              </thead>
      <tbody>';

		foreach ($data as $row) {

			$outPut .=

				'

              <tr class="text-center">
                <td>' . $row['id'] . ' </td>
                <td>' . $row['fname'] . '</td>
                <td>' . $row['lname'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['phone'] . '</td>
                <td>
                    <a href="#" title="View Details" class="text-success infoBtn"><i class="fa fa-info-circle" aria-hidden="true"></i></a>&nbsp;&nbsp;

                    <a href="#" title="Edit user" class="text-primary editBtn" data-toggle="modal" data-target="#EditUserModal" id=' . $row['id'] . ' ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>&nbsp;&nbsp;

                    <a href="#" title="Delete user" class="text-danger delBtn"><i class="fa fa-trash" aria-hidden="true"></i></a>

                </td>
              </tr>';

		}

		$outPut .= ' </tbody> </table> ';
		echo $outPut;

	} else {

		echo '<p>there is no user</p>';
	}

}

///insert

if (isset($_POST["action"]) && $_POST["action"] == "insert") {

	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	return $db->Insert($fname, $lname, $email, $phone);
}

if (isset($_POST['edit_id'])) {

	$Id = $_POST["edit_id"];

	$row = $db->getUserById($Id);
	echo json_encode($row);
}

if (isset($_POST["action"]) && $_POST["action"] == "update") {

	$userId = $_POST["id"];
	$fname = $_POST["fname"];
	$lname = $_POST["lname"];
	$email = $_POST["email"];
	$phone = $_POST["phone"];
	return $db->Update($userId, $fname, $lname, $email, $phone);
}
?>