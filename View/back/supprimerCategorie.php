<?php
 include_once '../../Controller/CategorieC.php';
 $co = new CategorieC();
 if(isset($_GET['id'])){
     $co->supprimerCategorie($_GET['id']);
 
    header('Location:backCategorie.php');
    }

 ?>