<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Students Management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "solicode";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM etudients";
if ($result = mysqli_query($conn, $sql)) {
  if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-bordered'>";
    echo "<tr>";
        echo "<th scope='col'>Numéro D'inscription</th>";
        echo "<th scope='col'>Nom</th>";
        echo "<th scope='col'>Prénom</th>";
        echo "<th scope='col'>Date de naisonnace</th>";
        echo "<th scope='col'>Adress</th>";
        echo "<th scope='col'>Tel</th>";
        echo "<th scope='col'>Numéro de salle</th>";
        echo "<th scope='col'>Outher</th>";
    echo "</tr>";
    while($row = mysqli_fetch_array($result)){
      echo "<tr>";
          echo "<td>" . $row['numInscription'] . "</td>";
          echo "<td>" . $row['nom'] . "</td>";
          echo "<td>" . $row['prenom'] . "</td>";
          echo "<td>" . $row['dateDenaissance'] . "</td>";
          echo "<td>" . $row['adress'] . "</td>";
          echo "<td>" . $row['tel'] . "</td>";
          echo "<td>" . $row['numSalle'] . "</td>";
          echo "<td><button type='button' class='btn btn-success'>Modifier</button><button type='button' class='btn btn-danger'>Suprimer</button></td>";

      echo "</tr>";
  }
  echo "</table>";
  } else{
    echo "No records matching your query were found.";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}





?>