<?php

use PHPUnit\Framework\TestCase;

class RoomTest extends TestCase {
    public function testEconomyRoom() {
        $room = new EconomyRoom();
        $this->assertEquals("Эконом", $room->getDescription());
        $this->assertEquals(1000, $room->getCost());
    }

    public function testStandardRoomWithInternet() {
        $room = new StandardRoom();
        $room = new InternetDecorator($room);
        $this->assertEquals("Стандарт, выделенный Интернет", $room->getDescription());
        $this->assertEquals(2100, $room->getCost());
    }

    public function testLuxuryRoomWithMultipleServices() {
        $room = new LuxuryRoom();
        $room = new SofaDecorator($room);
        $room = new FoodDeliveryDecorator($room);
        $room = new DinnerDecorator($room);
        $this->assertEquals("Люкс, дополнительный диван, доставка еды в номер, ужин", $room->getDescription());
        $this->assertEquals(4600, $room->getCost()); // 3000 + 500 + 300 + 800
    }
}