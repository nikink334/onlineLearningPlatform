<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* General body styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
            position: fixed;
            height: 100%;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            margin-bottom: 20px;
            color: #ecf0f1;
            text-align: center;
            font-size: 1.5rem;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 5px;
            transition: background-color 0.3s ease-in-out;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #1abc9c;
        }


        /* Blank space styling */
        .blankSpace {
            margin-left: 350px; /* Leaves space for the sidebar */
            padding: 20px;
            width: calc(100% - 250px); /* Ensures the content occupies the remaining screen width */
            overflow-y: auto;
            height: 100vh;
            box-sizing: border-box;
            background-color: #ecf0f1;
        }
    </style>
    <script>
        // Load content dynamically into the blankSpace
        function loadContent(page) {
            const blankSpace = document.querySelector('.blankSpace');
            fetch(page)
                .then(response => {
                    if (!response.ok) {
                        throw new Error("Page not found.");
                    }
                    return response.text();
                })
                .then(data => {
                    blankSpace.innerHTML = data; // Replace blankSpace content with loaded content
                })
                .catch(error => {
                    blankSpace.innerHTML = '<h2>Error loading content. Try again later.</h2>';
                    console.error(error);
                });
        }

        // Function to update the date, day, and time
            function updateDateTime() {
                const dateTimeElement = document.getElementById('date-time');
                const now = new Date();

                // Format: Day, Month Date, Year | HH:MM:SS
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                const dateString = now.toLocaleDateString(undefined, options);
                const timeString = now.toLocaleTimeString();

                dateTimeElement.innerText = `${dateString} | ${timeString}`;
            }

            // Initial call and interval for continuous updates
            updateDateTime();
            setInterval(updateDateTime, 1000);

    </script>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="#" onclick="loadContent('course.php')">Course</a>
        <a href="#" onclick="loadContent('instructor.php')">Instructor</a>
        <a href="#" onclick="loadContent('learner.php')">Learner</a>
        <a href="#" onclick="loadContent('certificates.php')">Certificates</a>
        <a href="#" onclick="loadContent('report.php')">Report</a>
        <a href="\OnlineLearningPlatform\index.php" class="logout-button">Logout</a>
    </div>

    <div class="blankSpace">
        <div style="display: flex; flex-wrap: wrap; gap: 20px;">
            <!-- Card for Date, Day, and Time -->
            <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 300px; text-align: center;">
                <h2>Current Date & Time</h2>
                <p id="date-time" style="font-size: 1.2rem; color: #2c3e50;"></p>
            </div>

            <!-- Card for Admin Insights -->
            <div style="background-color: white; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); width: 300px; text-align: center;">
                <h2>Admin Insights</h2>
                <ul style="list-style: none; padding: 0; font-size: 1rem; color: #34495e; text-align: left;">
                    <li>Total Courses: <strong>10</strong></li>
                    <li>Total Instructors: <strong>5</strong></li>
                    <li>Total Learners: <strong>120</strong></li>
                    <li>Certificates Issued: <strong>50</strong></li>
                </ul>
            </div>
        </div>
    </div>

</body>
</html>
