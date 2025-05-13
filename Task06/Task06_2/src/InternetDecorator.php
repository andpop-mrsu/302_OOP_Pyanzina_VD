<?php

class InternetDecorator extends RoomDecorator {
    public function __construct(Room $room) {
        parent::__construct($room);
        $this->description = "выделенный Интернет";
        $this->cost = 100;
    }
}