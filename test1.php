<?php
	require("./dbc.php");
	if(isset($_POST['fname']) && !empty($_POST['fname']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['campus']) && !empty($_POST['campus']) && isset($_POST['interest']) && !empty($_POST['interest']))
	{
		$email_count=$db->email_checkv($_POST['email']);
		if($email_count==0)
		{	$name=$_POST['fname']." ".$_POST['lname'];
			$a=$db->insertv($name,$_POST['email'],$_POST['phone'],$_POST['campus'],$_POST['interest']);
			if($a){
				$err['stat']="reg";
				echo json_encode($err);
				$to="inkstorms.doon@gmail.com";
				$subject="Volunteer Registration Successful";
				$message="A new Volunteer has registered \nName: ".$_POST['fname']." ".$_POST['lname']."\nEmail ".$_POST['email']."\nMobile: ".$_POST['phone']."\nCampus/Locality/Company: ".$_POST['campus']."\nInterests ".$_POST['interest'];
				$headers = "From: InkStorms Dehradun";
				
			}else{
				echo "Unable to register";
			}

		}else{
			$err['stat']="farzi";
			echo json_encode($err);
		}
	}
	

?>
