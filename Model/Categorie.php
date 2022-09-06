<?php
class categorie{
    private ?int $ref = null;
    private ?string $nom = null;
    function __construct(string $nom)
    {
        
        $this->nom=$nom;
        
    }
    function getRef(): int{
        return $this->ref;
    }
    function getNom(): string{
        return $this->nom;
    
    }
   
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    
    
}
?>