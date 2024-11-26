<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "semfirstproject_olp";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted for registration
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    // Get form data
    $name = $_POST["register-name"];
    $email = $_POST["register-email"];
    $contact = $_POST["register-contact"];
    $password = $_POST["register-password"];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL query to insert user data into the database using prepared statements
    $stmt = $conn->prepare("INSERT INTO learner (username, email, contact_no, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $contact, $hashed_password);

    // Execute the query
    if ($stmt->execute()) {
        echo '<script>alert("Registration successful");</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Check if the form is submitted for login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Get form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare the SQL query to fetch user data based on email
    $stmt = $conn->prepare("SELECT id, password FROM learner WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();

        // Verify the password against the hashed password
        if (password_verify($password, $stored_password)) {
            // Redirect the user to the dashboard or any other page
            header("Location: dashboard.php");
            exit;
        } else {
            // Login failed
            echo '<script>alert("Incorrect email or password");</script>';
        }
    } else {
        // No user found with the given email
        echo '<script>alert("No user found with this email");</script>';
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Register</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="login-container">
        <button onclick="showLogin()" class="twoOption">Login</button>
        <button onclick="showRegister()" class="twoOption">Register</button>

        <!-- Login Form -->
        <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <h2 class="mainHead">User Login</h2>
            <div class="form-group">
                <label for="email" class="label">Email:</label>
                <input type="email" id="email" name="email" required autocomplete="email" class="input-field">
            </div>
            <div class="form-group">
                <label for="password" class="label">Password:</label>
                <input type="password" id="password" name="password" required autocomplete="current-password" class="input-field">
            </div>
            <button type="submit" name="login" class="center-button">Login</button>
        </form>

        <!-- Register Form -->
        <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="display: none;">
            <h2 class="mainHead">User Register</h2>
            <div class="form-group">
                <label for="register-name" class="label">Name:</label>
                <input type="text" id="register-name" name="register-name" required autocomplete="name" class="input-field">
            </div>
            <div class="form-group">
                <label for="register-email" class="label">Email:</label>
                <input type="email" id="register-email" name="register-email" required autocomplete="email" class="input-field">
            </div>
            <div class="form-group">
                <label for="register-contact" class="label">Contact:</label>
                <input type="text" id="register-contact" name="register-contact" required autocomplete="tel" class="input-field">
            </div>
            <div class="form-group">
                <label for="register-password" class="label">Password:</label>
                <input type="password" id="register-password" name="register-password" required autocomplete="new-password" class="input-field">
            </div>

            <button type="submit" name="register" class="center-button">Register</button>
        </form>
    </div>
    
    <script>
        function showLogin() {
            document.getElementById("loginForm").style.display = "block";
            document.getElementById("registerForm").style.display = "none";
        }

        function showRegister() {
            document.getElementById("loginForm").style.display = "none";
            document.getElementById("registerForm").style.display = "block";
        }
    </script>
</body>
</html>
