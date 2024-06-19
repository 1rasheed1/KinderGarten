<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Kindergarten";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Tname, Twork, Tage, Tsalary, Temail FROM teachers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "
    <div class='table-responsive' style='overflow-y: auto; max-height: 400px;'>
        <table id='teacherTable' class='table table-bordered table-striped' style='cursor: pointer; border-collapse: collapse;'>
            <thead>
                <tr>
                    <th style='padding: 10px;'>Name</th>
                    <th style='padding: 10px;'>Work</th>
                    <th style='padding: 10px;'>Age</th>
                    <th style='padding: 10px;'>Salary</th>
                    <th style='padding: 10px;'>Email</th>
                </tr>
            </thead>
            <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr onclick=\"selectRow('teacherTable', this)\">
        <td style='padding: 10px;'>" . htmlspecialchars($row["Tname"]) . "</td>
        <td style='padding: 10px;'>" . htmlspecialchars($row["Twork"]) . "</td>
        <td style='padding: 10px;'>" . htmlspecialchars($row["Tage"]) . "</td>
        <td style='padding: 10px;'>" . htmlspecialchars($row["Tsalary"]) . "</td>
        <td style='padding: 10px;'>" . htmlspecialchars($row["Temail"]) . "</td>
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



