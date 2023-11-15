<?php

class CarPolicy
{
    private $policyNumber = 0;
    private $yearlyPremium = 0;
    private $dateOfLastClaim = "";
    //private policyHolder = "";//
    
    public function __construct($policyNumber, $yearlyPremium)
    {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
    }
    
    //I only know how ti make functions so I'm just gopnna make two functions instead of adding it into one//
    public function setDateOfLastClaim($dateOfLastClaim)
    {
        $this->dateOfLastClaim = $dateOfLastClaim;
    }
    
    public function getTotalYearsNoClaims()
    {
        $currentDate = new DateTime();
        $lastDate= new DateTime($this->dateOfLastClaim);
        $interval = $currentDate->diff($lastDate);
        return $interval->format("%y");
    }
    
    public function __toString()
    {
        return $this->policyNumber;
        
    }
        
}