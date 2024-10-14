<?php
require_once __DIR__ . '/prodotti.php';
require_once __DIR__ . '/../trait/Trait.php';

class Gioco extends Product {
    use DescriptionTrait;
    private $materiale;

    public function __construct($title, $price, $image, $category, $material, $description) {
        parent::__construct($title, $price, $image, $category, 'Gioco');
        $this->material = $material;
        $this->setDescription($description);
    }

    public function getMaterial() {
        return $this->material;
    }
}