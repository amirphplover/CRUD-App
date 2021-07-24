<?php
include_once "config/config.php";

class Dbh {

	private $username = USER;
	private $password = PASSWORD;
	private $Dsn = "mysql:host=" .   . ";dbname=" . DBNAME;
	public $conn;

	public function __construct() {

		return $this->connect();
	}

	public function connect() {

		try {

			$this->conn = new pdo($this->Dsn, $this->username, $this->password);
			$this->conn->query("SET charachter set utf8");
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->conn;

		} catch (PDOException $e) {

			echo "faild connection!!" . $e->getMessage();

		}
	}

	public function Insert($fname, $lname, $email, $phone) {

		$sql = "INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `phone`) VALUES (NULL, :fname, :lname, :email, :phone)";
		$res = $this->conn->prepare($sql);
		$res->execute(['fname' => $fname, 'lname' => $lname, 'email' => $email, 'phone' => $phone]);

	}

	public function getAllUser() {
		$data = array();
		$sql = "SELECT * FROM users";
		$res = $this->conn->prepare($sql);
		$res->execute();
		$res->fetchAll(PDO::FETCH_ASSOC);
		foreach ($res as $row) {

			$data[] = $row;
		}
		return $data;

	}

	public function getUserById($id) {

		$sql = "SELECT * FROM users WHERE id = :id";
		$res = $this->conn->prepare($sql);
		$res->execute(['id' => $id]);
		$data = $res->fetch(PDO::FETCH_ASSOC);
		return $data;
	}

	public function Update($userId, $fname, $lname, $email, $phone) {

		$sql = "UPDATE `users` SET `fname`=:fname,`lname`= :lname,`email`= :email,`phone`= :phone WHERE id = :userId";
		$res = $this->conn->prepare($sql);
		$res->execute(['fname' => $fname, 'lname' => $lname, 'email' => $email, 'phone' => $phone, 'userId' => $userId]);
		return true;
	}

	public function Delete($id) {

		$sql = "DELETE * FROM users WHERE id = :id";
		$res = $this->conn->prepare($sql);
		$res->execute([':id' => $id]);
	}

	public function TotalRowCount() {

		$sql = "SELECT * FROM users";
		$res = $this->conn->prepare($sql);
		$res->execute();
		$T_row = $res->rowCount();
		return $T_row;
	}

}

$db = new Dbh;

echo $db->TotalRowCount();

?>