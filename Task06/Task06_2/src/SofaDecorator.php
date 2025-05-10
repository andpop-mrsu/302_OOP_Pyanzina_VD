<?php

class SofaDecorator extends RoomDecorator {
    public function __construct(Room $room) {
        parent::__construct($room);
        $this->description = "дополнительный диван";
        $this->cost = 500;
    }
}