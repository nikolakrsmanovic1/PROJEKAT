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
    <title>Login</title>
</head>
<body>
    

<?php
    $greska="";
    if (isset($_POST['reg'])) {
        $reg = ($_POST['reg']);    
        $password = ($_POST['lozinka']);   
        $query    = "SELECT * FROM ekipe WHERE registracioni_broj='$reg'  AND lozinka='$password'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        $row = mysqli_fetch_assoc($result);
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION["loggedIn"] = 1;
            $_SESSION['user'] = $row['trener'];
            header("Location:../index.php");
           $greska="";
        } else 
        {
             $greska="Neispravni podaci ";
        }


    } 
?>

<div class="container forma1 ">
 <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
			<h1 class="centar">LOGIN</h1>
			<hr>
			<div class="row">
				<div class="col-md-6">
				<h1 class="prvi">Ulogujte se</h1>
			</div>
				<div class="col-md-6 ">
					<div class="form-group desno">
                        <label class="velicina"> Registracioni broj:</label>
                         <input type="text" minlength='5' maxlength='5' name="reg"  class="duzina" ><br><br>
					</div>
					<div class="form-group desno">
                    <label class="velicina"> Lozinka:</label>
                        <input type="password" name="lozinka"  class="duzina" ><br><br>
					</div>
						<div class="form-group desno">
                        <input type="submit" name="submit" value="Potvrdi">  
                        <br><br>
                        <?php echo $greska; ?>
                         
						</div>
			</div>
		</div>
 </form>	
</div>
<?php include "../components/footer.php";?> 
</body>
</html>