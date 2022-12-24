<?php
           session_start();
           include '../database/konekcija.php';
           include '../components/navbar.php';    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php
        {
         $kom="";
         $_SESSION['idutakmice']=$_GET['id'];      
          $sql = "SELECT id,domacin,gost,datum FROM utakmice  WHERE id = " . $_SESSION["idutakmice"];
          $result = $conn->query($sql);
          $row = $result->fetch_assoc();
          $imedomacina = $row["domacin"];
          $imegosta=$row["gost"];
          $datum=$row["datum"];
          $idZaUnos=$row["id"];
          $username=$_SESSION['user'];
      echo '<div class="jumbotron jumbotron-fluid">
      <div class="media">
      <div class="media">
      <div class="media-left">
         
      </div>

    </div>
     </div>
      <div class="container velicina">
        <h1 class="display-2">'. $imedomacina."-".$imegosta.'</h1>
        <h2 class="lead">'. $datum.'</h2>
        <form method="POST">
        <textarea name="kom" type="text"></textarea> <br><br>
        <input type="submit" name="submit" value="Kreiraj "> 
        </form>
      </div>
    </div>';

    if(isset($_POST["submit"]))
    {
      if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == 0)
      {
        echo "<script>alert('Morate biti prijavljeni kao skaut da biste komentarisali');</script>";
        exit();
      }

      $kom = $_POST["kom"];
    
        if($kom=="")
        {
          echo "Morate uneti komentar";
        }
        else
        {
          $sql2 = "INSERT INTO komentari (opis,imeKreatora,utakmica_id) VALUES ('$kom','$username','$idZaUnos')";
          if ($conn->query($sql2) === TRUE) {
            echo "";
            } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
            }
        }
       
        
        } 
  }

  $sql3 = "SELECT opis,imeKreatora, utakmica_id,datum FROM komentari WHERE utakmica_id = " . $_SESSION["idutakmice"] . " ORDER BY datum DESC";
  $result3 = $conn->query($sql3);
 if ($result3->num_rows > 0) {
    while($row3 = $result3->fetch_assoc()){
      
          echo '<div class="container komentari">   
          <p class="display-6 ">'. $row3["opis"]." -------------- ".$row3['imeKreatora'].' '.$row3['datum'].'</p>    
          </div> ';
    }  
  }
  $conn->close();
                 
?>      
</body>
</html>