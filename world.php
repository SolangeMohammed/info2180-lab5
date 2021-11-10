<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET["country"];
$cities= $_GET["context"]; 

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$citysearch= $conn->query("SELECT countries.name AS countryname, cities.name AS city, cities.district, cities.population FROM countries, cities WHERE countries.code = cities.country_code"); 
$results1 = $citysearch->fetchALL(PDO::FETCH_ASSOC); 
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
  echo "</table>"; 
endif; 

?>

<?php if($cities == "cities"):

  echo "<table>
  <tr>
    <th>Name</th>
    <th>District</th>
    <th>Population</th>
  </tr>"; ?>
  <?php 
  foreach($results1 as $row): {
    if($row['countryname']== $country):
      {
        echo "<tr>"; 
        echo "<td>" .$row['city']. "</td>";
        echo "<td>" .$row['district']. "</td>";
        echo"<td>" .$row['population']. "</td>";
        echo "</tr>";  

      }
    endif; 
  }
  endforeach;
endif; 
echo "</table>"; 
?>


<?php
    header('Access-Control-Allow-Origin: *');
?>
