<?php 

    require("connection.php"); 
 
    $submitted_username = ''; 
     

    if(!empty($_POST)) 
    { 

        $query = " 
            SELECT 
                audt_id, 
                username, 
                password 
 
            FROM audit_report_login 
            WHERE 
                username = :username and
				password= :password
        "; 
         

        $query_params = array( 
            ':username' => $_POST['username'],
			 ':password' => $_POST['password']
        ); 
         
        try 
        { 

            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) 
        { 
 
            die("Failed to run query: " . $ex->getMessage()); 
        } 
 
        $login_ok = false; 

        $row = $stmt->fetch(); 
        if($row) 
        { 

            $check_password = $row['password']; 
             
            if($check_password == $row['password']) 
            { 

                $login_ok = true; 
            } 
        } 

        if($login_ok) 
        { 
              $name=$_POST['username'];
			  $pass=$_POST['password'];
			 
            $_SESSION['user'] = $row;
			
			date_default_timezone_set("ASIA/KOLKATA");
	        $last_login_date= date("d/m/Y h:i:s a");
			
			$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);

			$query_3= "UPDATE `audit_report_login` SET `last_login_date`='$last_login_date',`user_ip`='$hostname'  WHERE username = '$name' and password= '$pass'";
            $result_3= mysql_query($query_3);
 
            header("Location: view_report.php"); 
            die("Redirecting to: view_report.php"); 
        } 
        else 
        { 
           echo "<script> window.location= 'index.php?error'; </script>";
        } 
    } 
	
	

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="css/globalstyle.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="wrap">
    	
    	<div class="header">
        	<div class="top_header">
            	<div class="wrapper">
                	<a class="logout">Log Out</a>
                </div>
            </div>
            <div class="middle_header">
            	<div class="wrapper">
                    <div class="logo">
                        <a href="">
                            <img src="images/logo.png" />
                        </a>
                    </div>
                    <div class="right_logo">
                        <img src="images/text_right.png" />
                    </div>
            	</div>
            </div>
        </div>
        <div class="wrapper">
        	<div class="main_container">
            	<form method="post" action="" name="login" id="login">
                <div class="login_panel">
                	<h2>Login</h2>
                    <ul>
                    	<li>
                        	<p>Username</p>
                        	<input type="text" id="username" name="username" />
                        </li>
                        <li>
                        	<p>Password</p>
                        	<input type="password" id="password" name="password" />
                        </li>
                        <li>
                        	<button onclick="this.form.submit();">Login</button>
                        </li>
                    </ul>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
