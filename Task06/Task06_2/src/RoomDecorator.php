<?php

abstract class RoomDecorator extends Room {
    protected $room;

    public function __construct(Room $room) {
        $this->room = $room;
    }

    public function getDescription() {
        return $this->room->getDescription() . ", " . $this->description;
    }

    public function getCost() {
        return $this->room->getCost() + $this->cost;
    }
}