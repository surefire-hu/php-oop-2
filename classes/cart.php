<?php

class Cart {
    private $products = [];
    private $user;

    public function __construct($user = null) {
        $this->user = $user;
    }

    public function addProduct($product) {
        $this->products[] = $product;
    }

    public function removeProduct($productTitle) {
        foreach ($this->products as $key => $product) {
            if ($product['title'] === $productTitle) {
                unset($this->products[$key]);
                return true;
            }
        }
        return false;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->products as $product) {
            $total += $product['price'];
        }
        if ($this->user && !$this->user['isGuest']) {
            $total *= 0.8;
        }
        return $total;
    }

    public function getProducts() {
        return $this->products;
    }
}
