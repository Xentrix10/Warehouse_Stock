<?php
session_start();
include 'form1_connect.php';

if ( !isset($_POST['username'], $_POST['password']) ) {
    echo '<script type="text/javascript">

            alert("No details");

            </script>';
	// Could not get the data that should have been sent.
	exit('No details');
}

if ($stmt = $con->prepare('SELECT password,userRole FROM Users WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['username']);

	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($password,$userRole);
        
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if ($_POST['password'] === $password) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
            
            session_regenerate_id();
		    $_SESSION['loggedin'] = TRUE;
		    $_SESSION['name'] = $_POST['username'];
            if($userRole === 'admin'){
                $_SESSION['role'] = "admin";
                header('Location: admin_w.php');

            }elseif($userRole === 'shop'){
                header('Location: shop_page.php');
                $_SESSION['role'] = "shop";
            }else{
                header('Location: entry.html');
                exit();

            }
            
        } else {
            // Incorrect password
            
            
            header('Location: entry.html');
            echo '<script type="text/javascript">

            alert("Incorrect password!");

            </script>';
            exit();
            
	
        }
    } else {
        // Incorrect username
        
            header('Location: entry.html');
            echo '<script type="text/javascript">

            alert("Incorrect username!");

            </script>';
            exit();
        
    }


	$stmt->close();
}



?>