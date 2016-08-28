<?php
	require("./dbc.php");
	if(isset($_POST['fname']) && !empty($_POST['fname']) && isset($_POST['contribute']) && !empty($_POST['contribute']) && isset($_POST['phone']) && !empty($_POST['phone']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['campus']) && !empty($_POST['campus']) && isset($_POST['region']) && !empty($_POST['region']) && isset($_POST['interest']) && !empty($_POST['interest']))
	{
		$email_count=$db->email_checkh($_POST['email']);
		if($email_count==0)
		{	$name=$_POST['fname']." ".$_POST['lname'];
			$a=$db->inserth($name,$_POST['email'],$_POST['phone'],$_POST['campus'],$_POST['region'],$_POST['interest'],$_POST['contribute']);
			if($a){
				$err['stat']="reg";
				echo json_encode($err);
				$to="inkstorms.doon@gmail.com";
				$subject="Registration Successful For HumanLib";
				$message="A new participant has registered \nName: ".$name."\nEmail ".$_POST['email']."\nMobile: ".$_POST['phone']."\nCampus/Locality/Company: ".$_POST['campus']."\nRegion: ".$_POST['region']."\nHow can he Contribute ".$_POST['contribute'];
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
