<?php include 'header.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        /* login page css*/
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }
        .form{
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 360px;
            margin: 0 auto 100px;
            padding: 45px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
		
        .txt,.form textarea{
            font-family: "Roboto", sans-serif;
            outline: 0;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin: 0 0 15px;
            padding: 15px;
            box-sizing: border-box;
            font-size: 14px;
        }
        #btn {
            font-family: "Roboto", sans-serif;
            text-transform: uppercase;
            outline: 0;
            background: #4CAF50;
            width: 100%;
            border: 0;
            padding: 15px;
            color: #FFFFFF;
            font-size: 14px;
            -webkit-transition: all 0.3 ease;
            transition: all 0.3 ease;
            cursor: pointer;
        }
        #btn:hover, #btn:active, #btn:focus {
            background: #43A047;
        }
        .form .message {
            margin: 15px 0 0;
            color: #b3b3b3;
            font-size: 12px;
        }
        .form .message a {
            color: #4CAF50;
            text-decoration: none;
        }
        .form .register-form {
            display: none;
        }
        .container {
            position: relative;
            z-index: 1;
            max-width: 300px;
            margin: 0 auto;
        }
        .container:before, .container:after {
            content: "";
            display: block;
            clear: both;
        }
        .container .info {
            margin: 50px auto;
        }
        .container .info h1 {
            margin: 0 0 15px;
            padding: 0;
            font-size: 36px;
            font-weight: 300;
            color: #1a1a1a;
        }
        .container .info span {
            color: #4d4d4d;
            font-size: 12px;
        }
        .container .info span a {
            color: #000000;
            text-decoration: none;
        }
        .container .info span .fa {
            color: #EF3B3A;
        }
        body {
            background: #FFFFFF;
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
	
   
</head>
<body>
    
    <!-- Page Header Start -->
    <div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Register Page</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Register</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="login-page">
        <div class="form">
            <form class="login-form" method="post" >
                <input type="text" placeholder="Username" class="txt" name="unm" required/>
                <input type="email" placeholder="Email" class="txt" name="email" required/>
                <input type="password" placeholder="Password"  class="txt" name="pwd" id="pwd" required/>
				<label style="font-size:12px;margin-right:150px;padding-bottom:10px">
				<input type="checkbox" id="showPassword" />&nbsp;Show Password
				
				</label>
                        <textarea id="message" name="add" rows="4"    cols="27" placeholder="Enter Addresss"></textarea><br><br>

                <input type="phone" placeholder="Phone number" class="txt" name="pnum" required/>
                <input type="submit" value="Submit" id="btn" name="submit"/>
                <p class="message">Already registered? <a href="login.php">Login In</a></p>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "zoofari";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get form data
        $name = $_POST['unm'];
        $email = $_POST['email'];
        $password = $_POST['pwd'];
        $address = $_POST['add'];
        $phone = $_POST['pnum'];
		$isAdmin=0;
// Server-side validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<script>alert("Invalid email format");</script>';
        } elseif (strlen($password) < 6) {
            echo '<script>alert("Password must be at least 6 characters long");</script>';
        } elseif (!preg_match('/^\d{10}$/', $phone)) {
            echo '<script>alert("Phone number must be exactly 10 digits");</script>';
        } else {
            // If validation passes, insert data into the database
            $sql = "INSERT INTO user_rajister (username, email, password, Address, phon, isAdmin) VALUES ('$name', '$email', '$password', '$address', '$phone', '$isAdmin')";

            if ($conn->query($sql) === TRUE) {
                echo '<script>alert("Register successfully!");</script>';
				echo'<script>window.location.href = "login.php";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        // Close connection
      //  $conn->close();
    }
    ?>

    <?php include 'footer.php'; ?>
</body>
</html>
<script>
        const passwordInput = document.getElementById('pwd');
        const showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    </script>