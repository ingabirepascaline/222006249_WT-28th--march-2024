<?php
// Step 1: Establish a connection to your database
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mytest";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Write a SQL query to select the data you want from the database
$sql = "SELECT * FROM profile";

// Step 3: Execute the query
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

<h2>Data of Profile Table</h2>

<!-- Step 5: Display the data in an HTML table -->
<table>
    <tr>
    <th>ID</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>User_Id</th>
        <th>Is_completed</th>
    </tr>
    <?php
    // Step 4: Fetch the data from the query result
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["id"]."</td>";
            echo "<td>".$row["firstname"]."</td>";
            echo "<td>".$row["lastname"]."</td>";
            echo "<td>".$row["userid"]."</td>";
             echo "<td>".$row["isCompleted"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "0 results";
    }
    ?>
</table>

<?php
// Close the connection
$conn->close();
?>

</body>
</html>
