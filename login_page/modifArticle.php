<?php
    require_once "config.php";

    $nom=$_POST['nom'];
    $id=$_POST['modif'];
    $nbrStock=$_POST['stock'];
    //prix
    //desc
    //Image
    //fournisseur
    //categorie

    if(isset($_POST['modif'])){
        $sql= "UPDATE article SET nom = '$nom', nombre_en_stock = '$nbrStock' WHERE ID_article = '$id'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Modified with success !')</script>";
        }
        else
        {
            echo "<script>alert('Error in modification !')</script>";
        }
    }

?>