<?php

abstract class Room {
    protected $description;
    protected $cost;

    public function getDescription() {
        return $this->description;
    }

    public function getCost() {
        return $this->cost;
    }
}