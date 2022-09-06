<?php
class User{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $prenom = null;
    private ?string $email = null;
    private ?string $role = null;
    private ?string $mdp = null;
    function __construct(string $nom,string $prenom,string $email,string $role,string $mdp)
    {
        
        $this->nom=$nom;
        $this->prenom=$prenom;
        $this->email=$email;
        $this->role=$role;
        $this->mdp=$mdp;
    }
    function getId(): int{
        return $this->id;
    }
    function getNom(): string{
        return $this->nom;
    }
   
    function getPrenom(): string{
        return $this->prenom;
    }
    function getEmail(): string{
        return $this->email;
    }
    
   
    function getMdp(): string{
        return $this->mdp;
    }
    function getRole(): string{
        return $this->role;
    }
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setPrenom(string $prenom): void{
        $this->prenom=$prenom;
    }
    function setMdp(string $mdp): void{
        $this->mdp=$mdp;
    }

    function setRole(string $role): void{
        $this->role=$role;
    }
    function setEmail(string $email): void{
        $this->email=$email;
    }
 
   
}
?>