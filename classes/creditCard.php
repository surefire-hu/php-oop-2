<?php

class CreditCard {
    private $number;
    private $expiryDate;
    private $cvv;

    public function __construct($number, $expiryDate, $cvv) {
        $this->number = $number;
        $this->expiryDate = $expiryDate;
        $this->cvv = $cvv;
    }

    public function isValid() {
        $currentDate = date('Y-m');
        return $this->expiryDate >= $currentDate;
    }
}