<?php 
	if(isset($_GET['message'])){
		if($_GET['message'] == "failed"){
			echo '<div class="alert alert-danger" role="alert">
			Wrong Username or Password
		  </div>';
		}else if($_GET['message'] == "logout"){
			echo '<div class="alert alert-danger" role="alert">
			You successfully logout
		  </div>';
		}else if($_GET['message'] == "not_logged_in"){
			echo '<div class="alert alert-danger" role="alert">
			You must be logged in to access the dashboard!
		  </div>';
		}
	}
	?>
		
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ldap.php" method="post">
        <input type="text" name="username">
        <br>
        <input type="password" name="password">
        <br>
        <button type="submit">
        Login
		</button>
    </form>
</body>
</html>