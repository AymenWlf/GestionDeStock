<?php
require_once 'config.php';

//----------Suppression d'un article
if(isset($_POST['delete']))
{
    $prodId = $_POST['delete'];
    $sql ="DELETE FROM article WHERE ID_article ='$prodId'";
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        echo "<script>alert('Deleted with success !')</script>";
    }else
    {
        echo "<script>alert('Woops! error ! ')</script>";
    }
}
?>