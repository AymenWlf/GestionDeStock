<?php
/*
 * Created by Mehdi Hail
 * discord Rc#0440
*/

require_once 'config.php';

session_start();

error_reporting(0);

//------Pas de connexion !
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

//---------Ajout d'un article
require_once 'ajoutArticle.php';


//----------Suppression d'un article
require_once 'suppArticle.php';

//----------Modification d'un article
require_once 'modifArticle.php';
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
    <link rel="stylesheet" href="css/style.css">


</head>
    
    
<body style="  background: linear-gradient(to right, #008d36, #202020);">
    <br><br>
   <center> <a href="logout.php" style='background:#44ff22;color:#ffffff;font-size:15px;padding:8px 12px;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;text-decoration:none; margin-left: 1000px; '>Logout</a> </center>

    <?php echo "<center><h1>Bienvenue " . $_SESSION['username'] . "</h1></center>"; ?>
    
   
    
    <br><br>

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
            <div id="add">
                <h4 align="center">Ajoutez Votre Produits</h4>
                <div align="center" >
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST"  >
                        <br>
                        <table align="">
                            <tr><td></td><td><?php echo $mess; ?></td></tr>

                            <tr><td></td><td><strong>Nom produit</strong></td></tr>
                            <tr><td></td><td><input type="text" name="nom" class="champ" size="25"></td></tr>
                                
                            
                            <tr><td></td><td><strong>Prix unitaire</strong></td></tr>
                            <tr><td></td><td><input type="number" name="prix" class="champ" size="25"></td></tr>
                            
                            <tr><td></td><td><strong>Description</strong></td></tr>
                            <tr><td></td><td><input type="text" name="desc" class="champ" sire="50"></td></tr>

                            
                            <tr><td></td><td><strong>Stock</strong></td></tr>
                            <tr><td></td><td><input type="number" name="stock" class="champ" size="25"></td></tr>
                            
                            <tr><td></td><td><strong>Categorie</strong></td></tr>
                            <tr><td></td>
                                <td>
                                    <select name="categorie" id="cat-select">
                                        <?php 
                                            $sql = 'SELECT * FROM categorie';
                                            $rs = mysqli_query($conn,$sql);
                                        ?>
                                        <option value="">--Please choose an option--</option>
                                        <?php while($row = mysqli_fetch_assoc($rs))
                                        {
                                            $nom = $row['nom'];
                                            $id = $row['ID_categorie'];
                                        ?>
                                            <option value="<?php echo $id?>"><?php echo $nom?></option>
                                        <?php
                                        } 
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            
                            
                            <tr><td></td><td><strong>Fournisseur</strong></td></tr>
                            <tr><td></td>
                                <td>
                                    <select name="fournisseur" id="four-select">
                                        <?php 
                                            $sql = 'SELECT * FROM fournisseur';
                                            $rs = mysqli_query($conn,$sql);
                                        ?>
                                        <option value="">--Please choose an option--</option>
                                        <?php while($row = mysqli_fetch_assoc($rs))
                                        {
                                            $nom = $row['nom'];
                                            $prenom = $row['prenom'];
                                            $id = $row['ID_fournisseur'];
                                        ?>
                                            <option value="<?php echo $id?> "><?php echo $nom?> <?php echo $prenom?></option>
                                        <?php
                                        } 
                                        ?>
                                    </select>
                                </td>
                            </tr>

                        </table>
                            <br>
                            <br>
                        <input type="submit" name="bajout" value="Ajouter" class="btn btn-success" >
                        
                    </form>
                    <p><br></p>
                </div>
            </div>
            
        </div>
        <div class="slide" id="2">
            <h1>Votre Liste  </h1>
            <br>
            <?php $rq=mysqli_query($conn,"select * from article");?>
            <div class="tableList">
                <center><table border="1" id="tbfich" style="width:70%; " > 
                    <tr>
                        <th>Nom produit</th>
                        <th>Stock</th>
                        <th>-------</th>
                    </tr>
                <form method="POST"> 
                    <?php 
                        while ($row = mysqli_fetch_assoc($rq)){
                    ?>
                    <form method="post">
                        <?php
                            $id=$row['ID_article'];
                            $nomp=$row['nom'];
                            $stock=$row['nombre_en_stock'];
                            print'<tr>';
                            print'<td>';
                                echo 	"<input type='text' name='nom' class='champ' size='25' value='$nomp'>";
                            print'</td>';
                        
                            print'<td>';
                                echo 	"<input type='number' name='stock' class='champ' size='25' value='$stock'>";
                            print'</td>';
                            print'<td class="btns">';
                        ?>
                        <button type="submit" name="delete" class="btn btn-danger" value="<?php echo $id ?>"> Supprimer</button>
                        <button type="submit" name="modif" class="btn btn-warning" value="<?php echo $id ?>" > Appliquer</a>
                        <?php
                            print'</td>';
                            print'</tr>';
                            }
                        ?>
                    </form>   
                </form>
                </table></center>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    </div>
    <script>
    </script>
    </body>
</html>
