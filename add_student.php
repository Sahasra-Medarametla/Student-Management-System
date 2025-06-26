<<?php
include 'db.php';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $grade = $_POST['grade'];
    $attendance = $_POST['attendance'];

    $sql = "INSERT INTO students (name, email, course, grade, attendance) 
            VALUES ('$name', '$email', '$course', '$grade', '$attendance')";

    if ($conn->query($sql)) {
        echo "✅ Student added. <a href='index.php'>Back</a>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="http://localhost/student-management/styles.css">
</head>
<body>
    <h2>Add Student</h2>
    <form method="POST">
        Name: <input type="text" name="name" required><br><br>
        Email: <input type="email" name="email" required><br><br>
        Course: <input type="text" name="course" required><br><br>
        Grade: <input type="text" name="grade" required><br><br>
        Attendance: 
        <select name="attendance" required>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select><br><br>
        <input type="submit" name="submit" value="Add Student">
    </form>
</body>
</html>
