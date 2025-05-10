<?php

class BreakfastDecorator extends RoomDecorator {
    public function __construct(Room $room) {
        parent::__construct($room);
        $this->description = "завтрак \"шведский стол\"";
        $this->cost = 500;
    }
}