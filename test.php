<?php
	require("./dbc.php");
	if(isset($_POST['fname']) && !empty($_POST['fname']) && isset($_POST['address']) && !empty($_POST['address']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['campus']) && !empty($_POST['campus']) && isset($_POST['stu']) && !empty($_POST['stu']))
	{
		$email_count=$db->email_checkr($_POST['email']);
		if($email_count==0)
		{	$name=$_POST['fname']." ".$_POST['lname'];
			$a=$db->insertr($name,$_POST['address'],$_POST['campus'],$_POST['phone'],$_POST['email'],$_POST['stu']);
			if($a){
				$err['stat']="reg";
				echo json_encode($err);
				$to="inkstorms.doon@gmail.com";
				$subject="Participant Registration Successful";
				$message="A new participant has registered \nName: ".$_POST['fname']." ".$_POST['lname']."\nEmail ".$_POST['email']."\nMobile: ".$_POST['phone']."\nCampus/Locality/Company: ".$_POST['campus']."\nAddress: ".$_POST['address']."\nStudent ".$_POST['stu'];
				$headers = "From: InkStorms Dehradun";
				mail($to,$subject,$message,$headers);
				
			}else{
				echo "Unable to register";
			}

		}else{
			$err['stat']="farzi";
			echo json_encode($err);
		}
	}
	

?>
