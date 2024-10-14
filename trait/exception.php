<?php

class CustomException extends Exception {
    public function errorMessage() {
        return "Errore personalizzato: " . $this->getMessage();
    }
}