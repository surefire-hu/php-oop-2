<?php

require_once __DIR__ . '/../trait/Exception.php'; 

class Product {
    protected $title;
    protected $price;
    protected $image;
    protected $category;
    protected $type;

    public function __construct($title, $price, $image, $category, $type) {
        if (empty($title) || empty($price)) {
            throw new CustomException("Il titolo e il prezzo sono obbligatori.");
        }
        $this->title = $title;
        $this->price = $price;
        $this->image = $image;
        $this->category = $category;
        $this->type = $type;
    }

    public function getDetails() {
        return [
            'title' => $this->title,
            'price' => $this->price,
            'image' => $this->image,
            'category' => $this->category,
            'type' => $this->type
        ];
    }
}