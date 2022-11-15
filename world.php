<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM countries");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
$country =  filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$countryquery = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $countryquery->fetchAll(PDO::FETCH_ASSOC);
$context = filter_input(INPUT_GET, "context", FILTER_SANITIZE_STRING);
?>
<?php
    header('Access-Control-Allow-Origin: *');
?>

<table>
          <thead>
            <tr>
              <th>Country Name</th>
              <th>Continent</th>
              <th>Independence Year</th>
              <th>Head of State</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($results as $row): ?>
              <tr>
                <td><?= $row['name']?></td>
                <td><?= $row['continent']?></td>
                <td><?= $row['independence_year']?></td>
                <td><?= $row['head_of_state']?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>