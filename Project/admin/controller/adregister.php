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
		$isAdmin=1;
        // Insert data into database
        $sql = "INSERT INTO user_rajister (username, email, password, Address, phon,isAdmin) VALUES ('$name', '$email', '$password', '$address', '$phone','$isAdmin')";

        if ($conn->query($sql) === TRUE) {
			echo '<script>alert("inserted")</script>';
			echo '<script>window.location.href = "../index.php";</script>';

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close connection
        $conn->close();
    }
    ?>
