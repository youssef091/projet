<?php
 include_once '../../Controller/EvenementC.php';
 $co = new EvenementC();
 if(isset($_GET['id'])){
     $co->accepterEvenement($_GET['id']);
 
    header('Location:backEvenement.php');
    }

 ?>