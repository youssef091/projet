<?php
include_once("C:/xamppp/htdocs/youssef/config.php");
include_once("C:/xamppp/htdocs/youssef/Model/evenement.php");

class evenementC
{
    function afficherEvenement(){
        $sql="select * from evenement where accepte=1";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function afficherEvenementnonaccepte(){
    $sql="select * from evenement where accepte=0";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
function afficherFavoris($idUser){
    $sql="select * from favoris as fa inner join evenement as ev on fa.idEvent=ev.ref where fa.idUser=$idUser";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
function afficherEvenementUser($idUser){
    $sql="select * from participation as pa inner join evenement as ev on pa.idEvent=ev.ref where pa.idUser=$idUser";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
public function participer($idUser,$idEvent)
{
    $sql = "insert into participation values($idEvent,$idUser)";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
function afficherEvenementRech($critere,$rech){
 
    $sql="select * from evenement where $critere like '$rech%'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
function afficherEvenementTri($critere){
    $sql="select * from evenement order by $critere";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}



function afficherAvis($id){
    $sql="select * from avis where idEvent=$id";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}

public function ajouterEvenement($evenement){
    $sql="insert into evenement(nom,dateE,prix,refCat) values(:nom,:dateE,:prix,:refCat)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'nom'=>$evenement->getNom(),
        'dateE'=>$evenement->getDate(),
        'prix'=>$evenement->getPrix(),
        'refCat'=>$evenement->getRefCat()
        
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}




public function commenter($idEvent,$comm){
    $sql="insert into avis(idEvent,avis) values($idEvent,'$comm')";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}



function modifierEvenement($id,$evenement) {
    $sql="UPDATE evenement set nom=:nom,dateE=:dateE,prix=:prix,refCat=:refCat where ref=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nom' => $evenement->getNom(),
            'dateE'=>$evenement->getDate(),
            'prix'=>$evenement->getPrix(),
            'refCat'=>$evenement->getRefCat()
            
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }

  function accepterEvenement($id) {
    $sql="UPDATE evenement set accepte=1 where ref=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute(
            
        );			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }


  function AjouterFavoris($idUser,$idEvent) {
    $sql="insert into favoris values($idUser,$idEvent)";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute();			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }




public function afficherEvenementDetail(int $rech1)
    {
        $sql="select * from evenement where ref=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
public function supprimerEvenement($id)
{
    $sql = "DELETE FROM evenement WHERE ref=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
public function statistiques()
{
    $sql="SELECT refCat,count(*) from evenement group by refCat ";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}


}

?>