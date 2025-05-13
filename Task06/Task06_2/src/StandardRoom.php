<?php

class StandardRoom extends Room {
    public function __construct() {
        $this->description = "Стандарт";
        $this->cost = 2000;
    }
}