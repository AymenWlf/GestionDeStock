<?php
/*
 * Created by Mehdi Hail
 * discord Rc#0440
*/

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestion de stock";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>


<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

?>




<?php
//ajout
$mess="";
$code=@$_POST['code'];
$nom=@$_POST['nom'];
$prix=@$_POST['prix'];
if(isset($_POST['bajout'])){
    $exe1=mysqli_query($conn,"insert into produit values('$code','$nom','$prix')");
    if($exe1){
        $mess="Ajout réussie !!";
    }
    else
        $mess="Echec ajout !!";
}

?>





<html lang="en">
    
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Tooplate">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Welcome</title>

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/tooplate-main.css">
    <link rel="stylesheet" href="css/owl.css">
    <link rel="stylesheet" href="css/fontawesome.css">


</head>
    
    
<body style="  background: linear-gradient(to right, #008d36, #202020);">
    <br><br>
   <center> <a href="logout.php" style='background:#44ff22;color:#ffffff;font-size:15px;padding:8px 12px;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;text-decoration:none; margin-left: 1000px; '>Logout</a> </center>

    <?php echo "<center><h1>Bienvenue " . $_SESSION['username'] . "</h1></center>"; ?>
    
   
    
    <br><br><br><br><br><br><br>

    <div class="logo">
        <h1>Gestion de Stock</h1>

    </div>
    <nav>
        
        <ul>
            <li><a href="#1"><img src="img/icons8-add-50.png" > <em>Ajouter votre produits</em></a></li>
            <li><a href="#2"><img src="img/icons8-show-property-50.png" > <em>Afficher la liste</em></a></li>
            <li><a href="#3"><img src="img/icon-3.png" > <em>Our Gallery</em></a></li>
            <li><a href="#4"><img src="img/icon-4.png" > <em>connexion</em></a></li>

        </ul>

    </nav>
    <div class="slides">
        <div class="slide" id="1">

                    <h4 align="center">Ajoutez Votre Produits</h4>
                    <div align="center" >
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST"  >
                            
                            <table align="">
                                <tr><td></td><td><?php echo $mess; ?></td></tr>
                                
                                <tr><td></td><td><strong >Code produit</strong></td></tr>
                                
                                <tr><td></td><td><input type="text" name="code" class="champ" size="25"  ></td></tr>
                                 <br>
                                 <br>
                                

                                <tr><td></td><td><strong>Nom produit</strong></td></tr>
                                <tr><td></td><td><input type="text" name="nom" class="champ" size="25"></td></tr>
                                 
                                
                                <tr><td></td><td><strong>Prix unitaire</strong></td></tr>
                                <tr><td></td><td><input type="text" name="prix" class="champ" size="25"></td></tr>

                            </table>
                             <br>
                                <br>
                            <input type="submit" name="bajout" value="Ajouter" class="bouton"  >
                            
                            
                        </form>
                        <p><br></p>
                        
                    </div>

               
        </div>






        <div class="slide" id="2">
            <h1>Votre Liste  </h1>
            
            <br>
            
             
            
                
            <?php 
  
	$rq=mysqli_query($conn,"select * from produit");
	print'<div style="overflow-x:auto;">';
	print' <center> <table border="1" id="tbfich" style="width:70% " > </center>';
	print'<tr><th>Code produit</th><th>Nom produit</th><th>Prix unitaire</th></tr> ';
   
	while ($row = mysqli_fetch_assoc($rq)){
	$codep=$row['codeprod'];
	$nomp=$row['nomprod'];
	$prix=$row['prix'];
	print'<tr>';
	print'<td>';
	     echo $codep;
	print'</td>';
	
	
	print'<td>';
	     echo 	$nomp;
	print'</td>';
	
		print'<td>';
	     echo 	$prix;
	print'</td>';
	
	print'</tr>';
		}
	print'</table >';
print'</div>';

	?>
            <tr>
		<td>Code produit</td>';
            </tr>
        </div>




        <div class="slide" id="3">
            <p> hetresdffffffffffffffffffffffffffffffffffffffffffffffffffffffffff  </p>
        </div>


        <div class="slide" id="4">
            <p> ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss  </p>
        </div>

    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>



    <!-- Additional Scripts -->
    <script src="js/owl.js"></script>
    <script src="js/accordations.js"></script>
    <script src="js/main.js"></script>

    
    </div>
    </body>
</html>
