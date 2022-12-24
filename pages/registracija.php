<?php
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
  
    <title>Registracija</title>
</head>
<body>
<?php
    $txt="";
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        $br= $ime =$grad= $trener = $greskaIme = $greskagrad =$greskatrener=$greskalozinka=$lozinka=$greskaregbroj=$regbroj=$greskalozinka2="";
        if(isset($_POST["submit"]))
        {
            $br= $ime =$grad= $trener = $greskaIme = $greskagrad =$greskatrener=$greskalozinka=$lozinka=$greskaregbroj=$regbroj=$greskalozinka2="";
            $br=0;      
            $ime=$_POST["ime"];
            $grad=$_POST["grad"];
            $trener=$_POST["trener"];
            $lozinka=$_POST["lozinka"];
            $regbroj=$_POST["regbroj"];


            if (empty($_POST["ime"])) {
                $greskaIme = "Morate uneti ime ekipe";
                    
            } 
            else
            {
                $br++;
            }
            if (empty($_POST["grad"])) {
                $greskagrad = "Morate uneti grad";
            }
            else
            {
                $br++;
            }
                 if (empty($_POST["lozinka"])) {
                        $greskalozinka = "Morate uneti lozinku";
                    }
                    else
                    {
                        $br++;
                    }                   
         
                $trener = test_input($_POST["trener"]);
                if (empty($_POST["trener"])) {
                    $greskatrener = "Morate uneti ime trenera";
                        
                } 
                else
                {
                    $br++;
                }
                if (!preg_match('/^[1-9][0-9]*$/', $regbroj)) {
                        $greskaregbroj="Morate uneti registarski broj duzine 5 karaktera";
                } else {
                    $br++;
                } 

        
        }   
            if($br==5)
            {
                $_SESSION["loggedIn"] = 1;
                $sql = "INSERT INTO ekipe (ime_ekipe, grad, trener,registracioni_broj,lozinka)
                VALUES ('$ime','$grad','$trener','$regbroj','$lozinka')";
                 $_SESSION["regbroj"]=$regbroj;
                 if ($conn->query($sql) === TRUE) { }
            }
            else
            {
              
            }
            

            $conn->close();
            
    ?> 
 
  

<div class="container forma">			 
				
    
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <h1 class="h3 mb-3 fw-normal naslov">Registrujte svoju ekipu</h1>

    <div class="form-floating">
    Ime ekipe
    <input type="text" placeholder="Ime ekipe" class="form-control" name="ime" value="<?php echo $ime; ?>"><span class="error">* <?php echo $greskaIme; ?></span><br> 
    </div>
    <div class="form-floating">
        Grad
      <input type="text" placeholder="Grad" class="form-control" name="grad" value="<?php echo $grad; ?>"><span class="error">* <?php echo $greskagrad; ?></span><br> 
    </div>

    <div class="form-floating">
        Trener
      <input type="text" placeholder="Trener" class="form-control" name="trener" value="<?php echo $trener; ?>"><span class="error">* <?php echo $greskatrener; ?></span><br> 
    </div>

    <div class="form-floating">
        Registracioni broj
      <input type="text" placeholder="Registracioni broj" minlength='5' maxlength='5' class="form-control" name="regbroj" value="<?php echo $regbroj; ?>"><span class="error">* <?php echo $greskaregbroj; ?></span><br> 
    </div>

    <div class="form-floating">
        Lozinka
      <input type="password" placeholder="Lozinka" class="form-control" name="lozinka" value="<?php echo $lozinka ?>"><span class="error">* <?php echo $greskalozinka; ?></span><br> 
    </div>
    <input class="w-100 btn btn-lg btn-primary" type="submit" name="submit" value="Registruj">
  </form>
</div>
    
<?php include "../components/footer.php";?>  
</body>
</html>