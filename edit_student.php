<?php
include 'db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM students WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];
    $grade = $_POST['grade'];
    $attendance = $_POST['attendance'];

    $sql = "UPDATE students SET name='$name', email='$email', course='$course', grade='$grade', attendance='$attendance' WHERE id=$id";

    if ($conn->query($sql)) {
        echo "✅ Student updated. <a href='index.php'>Back</a>";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="http://localhost/student-management/styles.css">
</head>
<body>
    <h2>Edit Student</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        Course: <input type="text" name="course" value="<?php echo $row['course']; ?>" required><br><br>
        Grade: <input type="text" name="grade" value="<?php echo $row['grade']; ?>" required><br><br>
        Attendance: 
        <select name="attendance">
            <option value="Present" <?php if ($row['attendance'] == "Present") echo "selected"; ?>>Present</option>
            <option value="Absent" <?php if ($row['attendance'] == "Absent") echo "selected"; ?>>Absent</option>
        </select><br><br>
        <input type="submit" name="submit" value="Update">
    </form>
</body>
</html>
