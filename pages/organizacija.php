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
  <link rel="stylesheet" href="../css/style.css">
    <title>Zreb</title>
</head>
<body>
<?php 
    $query ="SELECT ime_ekipe FROM ekipe";
    $result = $conn->query($query);
    if($result->num_rows> 0){
      $options= mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

?>   
<div class="container forma ">
 <form action="" method="post">
 Izaberite domaćina
	<select name="domacin" class="form-select mt-3 velicina">
  <?php 
  foreach ($options as $option)
  {
  ?>
    <option ><?php echo $option['ime_ekipe'];?></option>
    <?php 
    }
   ?>
</select>

Izaberite gosta
<select name="gost" class="form-select mt-3 velicina">
  <?php 
  foreach ($options as $option1)
  {
  ?>
    <option><?php echo $option1['ime_ekipe'];?></option>
    <?php 
  } 
   ?>
</select>
<br>
  Datum odigravanja utakmice
        <div class="form-group" id="datepicker">
          <input type="date" class="form-control" name="date" required/>
      </div>
  <br>
  <button type="submit">Organizujte utakmicu</button>
  </form>
</div>
<?php

 if(!empty($_POST['domacin'])&&!empty($_POST['gost'])&&!empty($_POST['date'])) 
 {
  $domacin = $_POST['domacin'];
  $gost=$_POST['gost'];
  $datum=$_POST['date'];
  $danasnji = date("Y-m-d");
  
  if($domacin==$gost)
  {
    echo "Morate izabrati razlicite ekipe <br>";
  }
  if ($danasnji >= $datum)
  {
      echo 'Morate izabrati ispravan datum <br>';
  } 
  else
  {
      $sql = "INSERT INTO utakmice (domacin,gost,datum)
      VALUES ('$domacin', '$gost', '$datum')";    
      if ($conn->query($sql) === TRUE) {
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
  }
 }


?>

</body>
</html>