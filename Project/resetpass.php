<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Form</title>
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
    <?php include 'header.php'; ?>

    <!-- Page Header Start -->
    <div class="container-fluid header-bg py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Register Page</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Reset Password</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <div class="login-page">
        <div class="form">
		SET NEW PASSWORD
            <form class="login-form" method="post">
                <input type="email" placeholder="enter your register email" name="email"   class="txt" required/>
                <input type="password" placeholder="New Password" name="npwd" id="npwd" class="txt" required/>
				<label style="font-size:12px;margin-right:120px;padding-bottom:10px">
				<input type="checkbox" id="showPassword" />&nbsp;Show New Password
				
				</label>
                 <input type="password" placeholder="Confirm Password" name="cpwd" id="cpwd" class="txt"required/>
				 <label style="font-size:12px;margin-right:100px;padding-bottom:10px">
				<input type="checkbox" id="showconfirm" />&nbsp;Show Confirm Password
				
				</label>
      

                <input type="submit" value="Reset Password" id="btn" name="submit"/>
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

       if(isset($_POST['submit']))
	{
		//include ("dbcon.php");
		
		$email=$_POST['email'];
		$npass=$_POST['npwd'];
		$cpass=$_POST['cpwd'];
		
		if($npass==$cpass)
		{
			$qry="update user_rajister set password='$npass' where email='$email'";
			$q=mysqli_query($conn,$qry);
		
			if($q)
			{
				echo "<script>alert('Reset password successfuly....');</script>";
			}
		
			else
			{
				echo "<script>alert(' not ');</script>";
			}
		}
		else
		{
			echo "<script>alert('password can not be match with confirm...');</script>";
		}
		
	}
	}
    ?>

    <?php include 'footer.php'; ?>
</body>
</html>
<script>
        const passwordInput = document.getElementById('npwd');
		const confirmInput = document.getElementById('cpwd');
        const showPasswordCheckbox = document.getElementById('showPassword');
		const showconfirm = document.getElementById('showconfirm');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
		showconfirm.addEventListener('change', function() {
            if (this.checked) {
                confirmInput.type = 'text';
            } else {
                confirmInput.type = 'password';
            }
        });
    </script>