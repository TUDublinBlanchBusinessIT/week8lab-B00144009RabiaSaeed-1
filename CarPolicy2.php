<?php
//I submitted this in class but I forgot to commit it//
//Here is the car policy and it's private attributes//
class CarPolicy
{
    private $policyNumber = 0;
    private $yearlyPremium = 0;
    private $dateOfLastClaim = "";
    //private policyHolder = "";//
    
    //this is the constuctor function, there's two going into this//
    public function __construct($policyNumber, $yearlyPremium)
    {
        $this->policyNumber = $policyNumber;
        $this->yearlyPremium = $yearlyPremium;
    }
    //policies that don't have a claim between the years three and five get a 10% discount, policies that don't have a claim for more then five years get 15% discount//
    //I only know how to make functions so I'm just gopnna make two functions instead of adding it into one//
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
    
    public function getDiscount()
    {
        //
        //we need to get it right here//
        $yearOfNoClaim = $this->getTotalYearsNoClaims();
        if ($yearOfNoClaim >= 3 && $yearOfNoClaim>= 5){
            return 0.10;
        }
            
        elseif ($yearOfNoClaim > 5){
            return 0.15;
        }
    }
    
   //this is for the discounted premium//
//It's for yearly premium so the right amount should be subtracted//
    public function getDiscountedPremium()
    {
        $theDiscount = $this->getDiscount();
        $discountedPremium = $this->yearlyPremium * (1 - $theDiscount);
        return $discountedPremium;
    }
    
    //there's a mistake in the question, there can't be a " : " for this, if you run the test what I did will work//
    public function __toString()
    {
        return $this->policyNumber;
        
    }
        
}