<?php

// Create connection
$server = "localhost";
$user = "root";
$pass = "";
$database = "voting";


// Create connection
$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn) {
	die("<script>alert('Connection Failed.')</script>");
}

$search = $_POST['name'];

if ($search == "") {
	return;
}

$sql = "SELECT * FROM `position` WHERE id LIKE '%$search%' or name LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
echo "
<thead>
<tr>
	<th>Id</th>
	<th>Name</th>
</tr>
</thead>";
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		echo "	<tr>			
					<td><a href= 'search_data.php?data=" . $row['id'] . "'>" . $row['id'] . "</a></td>
		          	<td>" . $row['name'] . "</td>
		        </tr>";
	}
} else {
	echo "<tr><td>0 result's found</td></tr>";
}
