<?php
    require_once "config.php";

    $mess="";
    $nom=$_POST['nom'];
    $prix=$_POST['prix'];
    $desc=$_POST['desc'];
    $nbrStock=$_POST['stock'];
    $fournisseur=$_POST['fournisseur'];
    $categorie=$_POST['categorie'];
    //Image
    //categorie

    if(isset($_POST['bajout'])){
        $sql ="INSERT INTO article VALUES(NULL,'$nom','$desc','$nbrStock','test.png','$categorie','$fournisseur')";
        $exe1=mysqli_query($conn,$sql);
        if($exe1){
            $mess="Ajout réussie !!";
        }
        else
        {
            $mess="Echec ajout !!";
        }
    }

?>