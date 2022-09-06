<?php
class evenement{
    private ?int $ref = null;//attributs
    private ?string $nom = null;
    private ?string $date = null;
    private ?float $prix = null;
    private ?int $refCat = null;
    
    function __construct(string $nom,string $date,float $prix,int $refCat)
    {
        
        $this->nom=$nom;
        $this->date=$date;
        $this->prix=$prix;
        $this->refCat=$refCat;
        
    }
    function getRef(): int{
        return $this->ref;
    }
    function getNom(): string{
        return $this->nom;
    
    }
    function getDate(): string{
        return $this->date;
    
    }
    function getPrix(): float{
        return $this->prix;
    
    }
    function getRefCat(): int{
        return $this->refCat;
    
    }
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setDate(string $date): void{
        $this->date=$date;
    }
    function setPrix(float $prix): void{
        $this->prix=$prix;
    }
    
    
}
?>