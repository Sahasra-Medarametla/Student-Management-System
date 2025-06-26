<?php
include 'db.php';
$result = $conn->query("SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="http://localhost/student-management/styles.css">
</head>
<body>
    <h2>Student Records</h2>
    <a href="add_student.php">Add New Student</a>
    <br><br>
    <table>
        <tr>
            <th>S.No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Grade</th>
            <th>Attendance</th>
            <th>Registered</th>
            <th>Actions</th>
        </tr>
        <?php
        $serial = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $serial++ . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['course'] . "</td>";
            echo "<td>" . $row['grade'] . "</td>";
            echo "<td>" . $row['attendance'] . "</td>";
            echo "<td>" . $row['date_registered'] . "</td>";
            echo "<td>
                    <a href='edit_student.php?id=" . $row['id'] . "'>Edit</a> |
                    <a href='delete_student.php?id=" . $row['id'] . "' onclick=\"return confirm('Delete this student?');\">Delete</a>
                  </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>