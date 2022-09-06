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
if (isset($_GET['id']))
$evenementC->participer($idUser,$_GET['id']);
header('Location:participations.php');

?>