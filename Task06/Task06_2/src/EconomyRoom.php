<?php

class EconomyRoom extends Room {
    public function __construct() {
        $this->description = "Эконом";
        $this->cost = 1000;
    }
}