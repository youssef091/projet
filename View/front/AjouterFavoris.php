<?php
 include_once '../../Controller/EvenementC.php';
 include_once '../../Controller/UserC.php';
$evenementC = new EvenementC();
$idUser=null;
$userC = new UserC();
$u=$userC->selectConn();
foreach($u as $user){
    $idUser=$user['id'];
}
 $co = new EvenementC();
 if(isset($_GET['id'])){
     $co->ajouterFavoris($idUser,$_GET['id']);
 
    header('Location:index.php');
    }

 ?>