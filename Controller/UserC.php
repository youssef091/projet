<?php
include_once("C:/xamppp/htdocs/youssef/config.php");
include_once("C:/xamppp/htdocs/youssef/Model/User.php");
class UserC
{
    function afficherUser(){
        $sql="select * from user";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function selectConn(){
    $sql="select * from user where token='ON'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
function searchLogin($email,$mdp){
    $sql="select * from user where email='$email' AND mdp='$mdp'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
public function ajouterUser($user){
    $sql="insert into user(nom,prenom,email,role,mdp) values(:nom,:prenom,:email,:role,:mdp)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'nom'=>$user->getNom(),
        'prenom'=>$user->getPrenom(),
        'email'=>$user->getEmail(),
        'role'=>$user->getRole(),
        'mdp'=>$user->getMdp()
        
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}

public function setConn($email,$mdp)
{
    $sql="update user set token='ON' where email='$email' AND mdp='$mdp'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
public function setDisconn()
{
    $sql="update user set token='OFF' where token='ON'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

function modifierUser($id,$user) {
    $sql="UPDATE  user set nom=:nom,prenom=:prenom,email=:email,role=:role,mdp=:mdp where id=".$id."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nom'=>$user->getNom(),
            'prenom'=>$user->getPrenom(),
            'email'=>$user->getEmail(),
            'role'=>$user->getRole(),
            'mdp'=>$user->getMdp()
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }
public function afficherUserDetail(int $rech1)
    {
        $sql="select * from user where id=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function supprimerUser($id)
    {
        $sql = "DELETE FROM user WHERE id=".$id;
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