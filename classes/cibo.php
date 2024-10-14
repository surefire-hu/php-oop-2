<?php
require_once __DIR__ . '/Prodotti.php';
require_once __DIR__ . '/../trait/Trait.php';

class Cibo extends Product {
    use DescriptionTrait;
    private $flavor;

    public function __construct($title, $price, $image, $category, $flavor, $description) {
        parent::__construct($title, $price, $image, $category, 'Cibo');
        $this->flavor = $flavor;
        $this->setDescription($description);
    }

    public function getFlavor() {
        return $this->flavor;
    }
}