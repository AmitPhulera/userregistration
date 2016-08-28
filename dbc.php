<?php
class db_controller{
	private $host ="";
	private $user ="";
	private $password ="";
	private $database = "";
	public $conn;

	function __construct() {
		$this->conn = new mysqli($this->host,$this->user,$this->password,$this->database) ;
		if ($this->conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
	}
	function __destruct() {
		$this->conn->close();
	}
	function email_checkr($email)
	{
		$email=mysqli_real_escape_string($this->conn,htmlspecialchars($email));
		$query="SELECT COUNT(email) from register WHERE email='$email' ";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error ".$this->conn->error;
			return;
		}
		$row = $result->fetch_row();		
		return $row[0];	
		
	}
	function insertr($name,$address,$campus,$phone,$email,$stu)
	{
		$name=mysqli_real_escape_string($this->conn,htmlspecialchars($name));
		$address=mysqli_real_escape_string($this->conn,htmlspecialchars($address));
		$campus=mysqli_real_escape_string($this->conn,htmlspecialchars($campus));
		$phone=mysqli_real_escape_string($this->conn,htmlspecialchars($phone));
		$email=mysqli_real_escape_string($this->conn,htmlspecialchars($email));
		$stu=mysqli_real_escape_string($this->conn,htmlspecialchars($stu));
		$query="INSERT INTO register(name,email,phone,campus,address,stu) VALUES('$name','$email','$phone','$campus','$address','$stu')";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error ".$conn->error;
			return false;
		}
		else
			return true;
	}
	function email_checkv($email)
	{
		$email=mysqli_real_escape_string($this->conn,htmlspecialchars($email));
		$query="SELECT COUNT(email) from volunteer WHERE email='$email' ";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error ".$this->conn->error;
			return;
		}
		$row = $result->fetch_row();		
		return $row[0];	
		
	}
	function insertv($name,$email,$mobile,$campus,$interests)
	{
		$name=mysqli_real_escape_string($this->conn,htmlspecialchars($name));
		$interests=mysqli_real_escape_string($this->conn,htmlspecialchars($interests));
		$campus=mysqli_real_escape_string($this->conn,htmlspecialchars($campus));
		$mobile=mysqli_real_escape_string($this->conn,htmlspecialchars($mobile));
		$email=mysqli_real_escape_string($this->conn,htmlspecialchars($email));
		$query="INSERT INTO volunteer(name,email,mobile,campus,interests) VALUES('$name','$email','$mobile','$campus','$interests')";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error ".$conn->error;
			return false;
		}
		else
			return true;
	}
	function email_checkh($email)
	{
		$email=mysqli_real_escape_string($this->conn,htmlspecialchars($email));
		$query="SELECT COUNT(email) from humanlib WHERE email='$email' ";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error ".$this->conn->error;
			return;
		}
		$row = $result->fetch_row();		
		return $row[0];	
		
	}
	function inserth($name,$email,$phone,$campus,$region,$interests,$about)
	{
		$name=mysqli_real_escape_string($this->conn,htmlspecialchars($name));
		$interests=mysqli_real_escape_string($this->conn,htmlspecialchars($interests));
		$campus=mysqli_real_escape_string($this->conn,htmlspecialchars($campus));
		$phone=mysqli_real_escape_string($this->conn,htmlspecialchars($phone));
		$email=mysqli_real_escape_string($this->conn,htmlspecialchars($email));
		$about=mysqli_real_escape_string($this->conn,htmlspecialchars($about));
		$query="INSERT INTO humanlib(name,email,phone,campus,region,interests,about) VALUES('$name','$email','$phone','$campus','$region','$interests','$about')";
		$result=$this->conn->query($query);
		if(!$result){
			echo "Error ".$conn->error;
			return false;
		}
		else
			return true;
	}
	function displayr()
	{
		$query="SELECT * from register ORDER BY campus";
		$result=$this->conn->query($query);
		return $result;
	}
	function displayv()
	{
		$query="SELECT * from volunteer ORDER BY interests";
		$result=$this->conn->query($query);
		return $result;
	}
	function displayh()
	{
		$query="SELECT * from humanlib ORDER BY interests";
		$result=$this->conn->query($query);
		return $result;
	}
}
$db=new db_controller();
?>
