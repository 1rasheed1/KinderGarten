<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Kindergarten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Sname, Sfather, Sage, Sclass, Sphone FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "
    <div class='table-responsive' style='overflow-y: auto; max-height: 400px;'>
        <table id='studentTable' class='table table-bordered table-striped' style='cursor: pointer; border-collapse: collapse;'>
            <thead>
                <tr>
                    <th style='padding: 10px;'>Name</th>
                    <th style='padding: 10px;'>Father</th>
                    <th style='padding: 10px;'>Age</th>
                    <th style='padding: 10px;'>Class</th>
                    <th style='padding: 10px;'>Phone</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr onclick=\"selectRow('studentTable', this)\">
        <td style='padding: 10px;'>" . htmlspecialchars($row["Sname"]) . "</td>
        <td style='padding: 10px;'>" . htmlspecialchars($row["Sfather"]) . "</td>
        <td style='padding: 10px;'>" . htmlspecialchars($row["Sage"]) . "</td>
        <td style='padding: 10px;'>" . htmlspecialchars($row["Sclass"]) . "</td>
        <td style='padding: 10px;'>" . htmlspecialchars($row["Sphone"]) . "</td>
      </tr>";

    }
    echo "</tbody>
        </table>
    </div>";
} else {
    echo "<p>No data available</p>";
}

$conn->close();
?>



