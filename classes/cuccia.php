<?php
require_once __DIR__ . '/prodotti.php';
require_once __DIR__ . '/../trait/Trait.php';

class Cuccia extends Product {
    use DescriptionTrait;
    private $size;

    public function __construct($title, $price, $image, $category, $size, $description) {
        parent::__construct($title, $price, $image, $category, 'Cuccia');
        $this->size = $size;
        $this->setDescription($description);
    }

    public function getSize() {
        return $this->size;
    }
}