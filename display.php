<?php
  session_start();
  require("dbc.php");
  if(isset($_GET['z']) && $_GET['z'] =="logout")
      session_unset();
  if(isset($_POST['uname']) && isset($_POST['pass']) && !empty($_POST['uname']) && !empty($_POST['pass']))
  {
    if($_POST['uname']=="inkstorm" && $_POST['pass']=="dun" )
    {
      $_SESSION['user']="ditplacement";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/materialize.min.css">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registered Students</title>
</head>
<body>

  <?php if(isset($_SESSION['user']) && $_SESSION['user']=="ditplacement"): ?>

  <nav >
    <div class="nav-wrapper indigo lighten-3">
      <a href="#" class="brand-logo">Registered People</a>
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
		<ul id="nav-mobile"  class="right hide-on-med-and-down">
			<li><a href="displayh.php">HumanLib</a></li>
			<li><a href="displayv.php">Volunteers</a></li>
			<li><a href="display.php">Registered</a></li>
			<li><a href="display.php?z=logout">Logout</a></li>
		</ul>
		<ul id="mobile-demo" class="side-nav">
			<li><a href="displayh.php">HumanLib</a></li>
			<li><a href="displayv.php">Volunteers</a></li>
			<li><a href="display.php">Registered</a></li>
			<li><a href="display.php?z=logout">Logout</a></li>
		</ul>
    </div>
  </nav>
  
  <div class="container">
  <table class="z-depth-3 striped centered" style="margin-top:3%">
        <thead>
          <tr>
			  <th data-field="sno">SNo</th>
			  <th data-field="name">Name</th>
              <th data-field="email">Email</th>
              <th data-field="phone">Phone</th>
              <th data-field="campus">Campus</th>
              <th data-field="address">Address</th>
              <th data-field="stu">Student</th>
              <th data-field="date">Date</th>
          </tr>
        </thead>
        <tbody>
          
        <?php 
          $row=$db->displayr();
          $counter=1;
          while($res = mysqli_fetch_assoc($row)){
              echo "<tr><td>".$counter."</td>";
              echo "<td>".$res['name']."</td>";
              echo "<td>".$res['email']."</td>";
              echo "<td>".$res['phone']."</td>";
              echo "<td>".$res['campus']."</td>";
              echo "<td>".$res['address']."</td>";
              echo "<td>".$res['stu']."</td>";
              echo "<td>".$res['date']."</td></tr>";
             $counter++; 
          }
          
        ?>
        
          
        </tbody>
    </table>
    </div>
    <?php else: ?>
      <nav>
          <div class="nav-wrapper indigo lighten-3">
            <a href="#" class="brand-logo center">Login To Continue</a>
           </div>
      </nav>
        
        <div class="row container">
            <form style="margin-top:3%" class="col s12 z-depth-3 card card-small" action="display.php" method="POST">
              <div class="row">
                <div class="input-field col s12">
                  <input id="uname" type="text" class="validate" name="uname">
                  <label for="uname">Username</label>
                </div>
              </div>
              <div class="row">
                <div class="input-field col s12">
                  <input id="password" type="password" class="validate" name="pass">
                  <label for="password">Password</label>
                </div>
              </div>
              <div class="row center">
                
                  <button class="btn waves-effect waves-light"type="submit">Login</button>
                  
                </div>
              </div>
              
            </form>
  </div>
    <?php endif ?>      
    <script type="text/javascript" src="js/jq.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript">
		$( document ).ready(function(){
				$(".button-collapse").sideNav();
			})
	</script>	
</body>
</html>
