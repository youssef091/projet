<?php
include_once("C:/xamppp/htdocs/youssef/config.php");
include_once("C:/xamppp/htdocs/youssef/Model/categorie.php");

class categorieC
{
    function afficherCategorie(){
        $sql="select * from categorie";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function afficherCategorieRech($rech){
    $sql="select * from categorie where nom like '$rech%'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
public function ajouterCategorie($categorie){
    $sql="insert into categorie(nom) values(:nom)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'nom'=>$categorie->getNom()
        
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}


function modifierCategorie($id,$categorie) {
    $sql="UPDATE  categorie set nom=:nom where ref=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nom' => $categorie->getNom()
            
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }
public function afficherCategorieDetail(int $rech1)
    {
        $sql="select * from categorie where ref=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
public function supprimerCategorie($id)
{
    $sql = "DELETE FROM categorie WHERE ref=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
}

?>