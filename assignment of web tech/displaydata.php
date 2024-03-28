<?php

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mytest";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";


$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data in Table</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>

<h2>Data in User Table</h2>
<table>
    <tr>
    <th>ID</th>
        <th>Email</th>
        <th>Password</th>
        <th>Credation_Date</th>
        <th>Is_activated</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["password"]."</td>";
             echo "<td>".$row["creation_date"]."</td>";
             echo "<td>".$row["is_active"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
    ?>
</table>

<?php
$conn->close();
?>

</body>
</html>
