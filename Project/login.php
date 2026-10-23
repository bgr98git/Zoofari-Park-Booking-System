<?php
session_start();

if (isset($_POST['login'])) {
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
    $pwd = $_POST['pwd'];

        $stmt = $conn->prepare("SELECT * FROM user_rajister WHERE username = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username exists, now check the password
        $row = $result->fetch_assoc();
        if ($pwd == $row['password']) {
            // Password is correct
            $_SESSION['username'] = $name;
			$_SESSION['email'] = $row['email'];
			$_SESSION['uid'] = $row['uid'];
            $_SESSION['isAdmin'] = $row['isAdmin'];
             
 // Redirect based on isAdmin value
            if ($row['isAdmin'] == 1) {
                header("Location: admin/index.php");
            } else {
                header("Location: index.php");
            }
            exit();
        } else {
            // Password is incorrect
            header('Location: login.php?msg=Invalid%20password');
            exit();
        }
    } else {
        // Username does not exist
        header('Location: login.php?msg=Invalid%20username');
        exit();
    }


    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        /* login page css */
        @import url(https://fonts.googleapis.com/css?family=Roboto:300);

        .login-page {
            width: 360px;
            padding: 8% 0 0;
            margin: auto;
        }
        .form {
            position: relative;
            z-index: 1;
            background: #FFFFFF;
            max-width: 500px;
			
            margin: 0 auto 100px;
            padding:30px;
            text-align: center;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
        }
        .txt{
            font-family: "Roboto", sans-serif;
            background: #f2f2f2;
            width: 100%;
            border: 0;
            margin-top:20px;
            padding:15px;
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
        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border: 4px solid transparent;
            border-radius: 50%;
			color: #ffffff; /* Text color */
            background-color: #4CAF50; /* Green background color */
            border-color: #4CAF50; /* Matching border color */
			height:60px;
			width:500px;
			margin-left:33%;
			
      
        }
        
        .close {
            position: relative;
            top: -2px;
            right: -21px;
            color: inherit;
			background:#336633;
        }
		
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <!-- Page Header Start -->
    <div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Login Page</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <?php
    if (isset($_GET['msg'])) {
        echo '<div class="alert  fade show" role="alert">' . htmlspecialchars($_GET['msg']) . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>';
    }
    ?>

    <div class="login-page">
        <div class="form" >
            <form class="login-form" method="post" action=""  >
                <input type="text" placeholder="Username" name="unm" class="txt" required/>
                <input type="password" placeholder="Password" name="pwd" id="pwd"  class="txt" required/>
				<label style="font-size:12px;padding:15px;padding-top:10px;">
				<input type="checkbox" id="showPassword" />&nbsp;Show Password
				
				</label>
				<a href="resetpass.php" style="font-size:14px;padding-left:30px;">Forgote Password?</a>
                <input type="submit" value="Login" id="btn" name="login"/>
				
                <p class="message">Not registered? <a href="rajis.php">Create an account</a></p>
            </form>
        </div>
    </div>

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