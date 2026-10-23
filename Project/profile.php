<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not, redirect to the login page
    header("Location: login.php");
    exit;
}

// Include the database connection file
$host = 'localhost';
$db   = 'zoofari';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Prepare the SQL statement to fetch the user's data
$stmt = $pdo->prepare("SELECT * FROM user_rajister WHERE username = :username");
// Execute the statement with the session's username
$stmt->execute(['username' => $_SESSION['username']]);
// Fetch the user's data
$user = $stmt->fetch();

// If the user data is not found, handle the error
if (!$user) {
    echo "User not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        /* Add some basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .profile-container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .profile-container h1 {
            text-align: center;
        }
        .profile-container p {
            font-size: 1.2em;
        }
        .logout {
            display: block;
            width: 100%;
            padding: 10px;
            text-align: center;
            background-color: #006633;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h1>Welcome, <?php echo htmlspecialchars($user['username']); ?></h1>
        <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        <p>Address: <?php echo htmlspecialchars($user['Address']); ?></p>
        <p>Phone: <?php echo htmlspecialchars($user['phon']); ?></p>

        <a href="logout.php" class="logout">Logout</a>
    </div>
</body>
</html>
