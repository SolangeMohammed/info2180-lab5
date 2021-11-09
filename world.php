<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
 
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_GET["country"];
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
<?php
if($country !== ""):
echo "<table>

<tr>
  <th>Name</th>
  <th>Continent</th>
  <th> Independence </th>
  <th> Head of State </th>
</tr>"; ?>
<?php foreach($results as $row):
{
echo "<tr>"; 
echo "<td>" .$row['name']. "</td>";
echo "<td>" .$row['continent']. "</td>";
echo"<td>" .$row['independence_year']. "</td>";
echo"<td>" .$row['head_of_state']. "</td>";
echo "</tr>";
  
}
endforeach;
endif; 
echo "</table>"; 
?>




<?php
    header('Access-Control-Allow-Origin: *');
?>
