<?php
// Assuming you're connected to the database
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

// Assuming the user is logged in and their ID is available in session
// Replace with the session or actual user ID
$user_id = $_SESSION['user_id']; // Assuming the user ID is stored in session after login

// Query to fetch the courses the user is enrolled in
$sql = "SELECT c.course_name, uc.enrollment_date, uc.completion_date, uc.status 
        FROM courses c
        JOIN user_courses uc ON c.course_id = uc.course_id
        WHERE uc.user_id = $user_id";

$result = $conn->query($sql);

// Fetching all the courses
$courses = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
} else {
    $courses = [];
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EasyLearning Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="navdiv">
            <div class="logo"> <a href="#" class="nav-link">EasyLearning</a> </div>
            <ul class="nav-list">
                <li><a href="#" class="nav-link" onclick="loadContent('maintenance.php')">Course</a></li>
                <li><a href="#" class="nav-link" onclick="loadContent('complaint.php')">Doubts</a></li>
                <li><a href="#" class="nav-link" onclick="loadContent('visitor.php')">Certificates</a></li>
                <li><a href="#" class="nav-link" onclick="loadContent('feedback.php')">Feedback</a></li>
                <li><a href="#" class="nav-link" onclick="loadContent('profile.php')">Profile</a></li>
                <li><a href="login.php" class="nav-link">LogOut</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main content area for courses -->
    <div class="main-content">
        <div class="course-cards">
            <?php if (count($courses) > 0): ?>
                <?php foreach ($courses as $course): ?>
                    <div class="course-card">
                        <div class="course-card-header">
                            <span class="course-name"><?php echo $course['course_name']; ?></span>
                            <span class="course-enrollment-date"><?php echo 'Enrolled on: ' . $course['enrollment_date']; ?></span>
                        </div>
                        <div class="course-card-body">
                            <div class="course-status">
                                <?php if ($course['status'] == 'completed'): ?>
                                    <span class="completed">Completed on: <?php echo $course['completion_date']; ?></span>
                                <?php else: ?>
                                    <span class="ongoing">Ongoing</span>
                                <?php endif; ?>
                            </div>
                            <a href="course_detail.php?course_id=<?php echo $course['course_id']; ?>" class="course-detail-link">View Course</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No courses enrolled.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="footerM">
        <div>
            <p class='mainHead'> <b> EasyLearning! </b> </p> 
            <p class='paraAbout'> Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem quia libero fugit modi molestiae magni voluptatum veniam iure repellat qui. Odio hic amet ipsa maiores deserunt inventore eos et saepe!</p>
        </div>

        <div>
            <p class='mainHead'> <b> Quick Links </b> </p>
            <ul class="linkFooter">
                <li><a href="/" class="menu"> Home </a></li>
                <li><a href="/Seats" class="menu"> Contact </a></li>
                <li><a href="clientSide\login.php" class="menu"> User </a></li>
            </ul>
        </div>

        <div id="contactID">
            <p class='mainHead'> <b> Social Media </b> </p>
            <ul class="linkFooter">
                <li> 
                    <a href="/"> <img class="imageSocial" src="images\instagram.png" alt="Insta" /> Instagram </a> 
                </li>
                <li> 
                    <a href="/"> <img class="imageSocial" src="images\twitter.png" alt="Twit" /> Twitter </a> 
                </li>
                <li> 
                    <a href="/"> <img class="imageSocial" src="images\youtubeF.png" alt="You" /> YouTube</a> 
                </li>
            </ul>
        </div>

        <div>
            <p class='mainHead'> <b> Contact </b> </p>
            <ul class="linkFooter">
                <li> <a href="tel: +91 1122334455"> Contact No: +91 9988776655 </a> </li>
                <li> <a href="mailto: airadva123@gmail.com"> Mail To: easylearning123@gmail.com </a> </li>
                <li> <a href=""> Address: Office-213, Magarpatta, Pune-28. </a> </li>
            </ul>
        </div>
            
    </footer>

    <div class="copyright">
        </hr>
        Copyright &copy; EasyLearner.com | All rights are reserved.
    </div>

    <script>
        var currentUrl = ""; // Variable to store the current iframe source URL

        function loadContent(url) {
            var frame = document.getElementById("frame");
            if (currentUrl !== url) { // Check if the clicked URL is different from the current URL
                frame.src = url; // Set the iframe source to the clicked URL
                currentUrl = url; // Update the current URL variable
            }
        }
    </script>
</body>
</html>
