<?php
//display error 
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

include_once '../clisconnect.php';

if(!isset($_SESSION)) { 
	session_start(); // Starting Session
} 

$error=''; // display error message on login page

		// Define $username and $password
		$username='f';
		$password='f';
		
		$sql = "SELECT * FROM csm01_users WHERE user_ID='$username'";

		$result = $connClis->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$hash = $row['user_PW'];
				if (password_verify($password, $hash)) {
                    $_SESSION['manager']      = $row["manager_checked"];
                    $_SESSION['protocol']     = $row["protocol_cd"];
                    $_SESSION['protocolname'] = $row["protocol_name"];
                    $_SESSION['site']         = $row["site_name"];
                    $_SESSION['login_user']   = $row["user_ID"];
                    $_SESSION['person']       = $row["user_name"];
                    $_SESSION['phone']        = $row["user_contact"];
                    $_SESSION['address']      = $row["user_address"];
                    $_SESSION['pickupLoc']      = $row["desig_locaiton"];
                    $_SESSION['pickupTime']      = $row["desig_time"];
                    $_SESSION['lab1']         = $row["check_lab1"];
                    $_SESSION['lab2']         = $row["check_lab2"];
                    $_SESSION['pick1']        = $row["check_pick1"];
                    $_SESSION['pick2']        = $row["check_pick2"];
                    $_SESSION['kit1']         = $row["check_kit1"];
                    $_SESSION['kit2']         = $row["check_kit2"];
                    $_SESSION['report1']      = $row["check_report1"];
                    $_SESSION['report2']      = $row["check_report2"];
                    $_SESSION['report3']      = $row["check_report3"];
                    if (!isset($_SESSION['page'])) {
                        $_SESSION['page'] = "labresult/index.php";
                    }
                    $_SESSION['staff'] = 'f';
				} else {
				    $error = 'Invalid Password';
				}

			}
		} else {
			$error = "Invaild Username";
		}



?>