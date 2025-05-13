<?php

class DinnerDecorator extends RoomDecorator {
    public function __construct(Room $room) {
        parent::__construct($room);
        $this->description = "ужин";
        $this->cost = 800;
    }
}