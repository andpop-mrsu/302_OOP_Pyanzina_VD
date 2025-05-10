<?php

class FoodDeliveryDecorator extends RoomDecorator {
    public function __construct(Room $room) {
        parent::__construct($room);
        $this->description = "доставка еды в номер";
        $this->cost = 300;
    }
}