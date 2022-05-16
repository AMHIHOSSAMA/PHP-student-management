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

<?php  
    if (isset($_SESSION['message'])) 
      ?> <div class="alert alert-<?=$_SESSION['msg_type']?>">
  

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
?>

  <form id="profile" action="indesx.php" method="POST">
  <div class='row g-4'>
  <div class='col-3'>
        <input class='form-control' type='number' name='numIns' id='numIns' placeholder='Numero dinscription'>
      </div>  
      <div class='col-3'>
        <input class='form-control' type='text' name='nom' id='nom' placeholder='Nom'>
      </div>  
      <div class='col-3'>
        <input class='form-control' type='text' name='prenom' id='prenom' placeholder='Prenom'>
        </div>  
        <div class='col-3'>
        <input class='form-control' type='date' name='date' id='date' placeholder='Date de naisonnace'>
        </div>  
        <div class='col-3'>
        <input class='form-control' type='text' name='adress' id='adress' placeholder='Adress'>
        </div>  
        <div class='col-3'> 
        <input class='form-control' type='tel' name='tel' id='tel' placeholder='Telephone'>
        </div>  
        <div class='col-3'>
        <input class='form-control' type='number' name='salle' id='salle' placeholder='Numéro de la salle'>
        </div>  
        <div class='col-3'>
          <input class='form-check-input' type='radio' name='presebt' id='present'>
          <label class='form-check-label' for='present'>
           Present
          </label>

          <input class='form-check-input' type='radio' name='absent' id='absent'>
          <label class='form-check-label' for='absent'>
            Absent
          </label>
        </div>  
    </div>
        <input class='btn btn-primary' name='adds' id="adds" type='submit' value='Ajouter' >
</form>
<?php
session_start();

if (isset($_POST['adds'])) {
    $numIns = $_POST['numIns'];
    $name = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date = $_POST['date'];
    $adress = $_POST['adress'];
    $tel = $_POST['tel'];
    $salle = $_POST['salle'];
    
    $_SESSION['message'] = "Les information a été enregistré";
    $_SESSION['ms_type'] ="success";

    if ($numIns !== '' && $name !== '' && $prenom !== '' &&  $date !== '' && $adress !== '' && $tel !== '' && $salle !== '' ){
      $conn->query("INSERT INTO etdiant(numInscription,nom,prenom,dateDenaissance,adress,tel) VALUES ('$numIns','$name','$prenom','$date','$adress','$tel')");
      $_SESSION['message'] = "Les information a été enregistré";
      $_SESSION['ms_type'] ="success";

      header("location: indesx.php");
    }else{
      echo '<script type="text/javascript">';
      echo ' alert("Remplir tous les obligatoires")';  //not showing an alert box.
      echo '</script>';
    }




}
$sql = "SELECT * FROM etdiant";
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
           ?><td><a name="edite" class="btn btn-success" onclick='window.location.reload();' href="indesx.php?edite=<?php echo $row['numInscription']; ?>">Modifier</a><a name="delete" class="btn btn-danger" onclick='window.location.reload();' href="indesx.php?delete=<?php echo $row['numInscription']; ?>">Supprimer</a></td>

     <?php echo "</tr>";
  }
  echo "</table>";
  } else{
    echo "No records matching your query were found.";
}
} else{
echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}


if (isset($_GET['delete'])) {
  $numIns = 
  
  
  
  
  
  
  
  ;
  $conn->query("DELETE FROM etdiant WHERE numInscription=$numIns");
  
    // echo '<script type="text/javascript">';
    // echo ' alert("Vous voulez supprimer ce personne?")';  //not showing an alert box.
    // echo '</script>';
    $_SESSION['message'] = "Les information a été supprimé";
    $_SESSION['ms_type'] ="danger";
    header("location: indesx.php");
}
if (isset($_GET['edite'])) {
  $numIns2 = $_GET['edite'];
  $conn->query("DELETE FROM etdiant WHERE numInscription=$numIns");
  
    echo '<script type="text/javascript">';
    echo ' alert("Vous voulez supprimer ce personne?")';  //not showing an alert box.
    echo '</script>';
    
}



?>